<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use App\Order;
use App\Patient;
use App\Room;
use App\Shift;
use App\User;
use App\Medical;
use App\Nurse;

use PDF;

class OrderController extends Controller
{
    public function exportOrderExcel()
    {
        return Excel::download(new OrdersExport, 'order-list.xlsx');
    }

    public function show()
    {
        $nurse_list = Nurse::select('id', 'patient', 'created_at','room', 'shift')
            ->orderBy('id', 'asc')
            ->get();

        return view('orders.cuadroPaciente', compact('nurse_list'));
    }

    public function index(Request $request)
    {
        $patients = Patient::all();
        $rooms = Room::all();
        $shifts = Shift::all();
        $users = User::all();

        /*$patient = $request->get('patient');*/
        $date_order = $request->get('date_order');

        $orders = Order::orderBy('date_order', 'desc')
            ->orderBy('n_fua','desc')
            ->date_order($date_order)
            ->paginate(30);
        return view('orders.index', compact('orders','patients', 'rooms', 'shifts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d');
        $ultima_fua= Order::select('id', 'n_fua')->whereDate('created_at', '=', $fecha)->latest()->first();

        if ($ultima_fua == null)
           $sig_fua = 5000;
        else
            $sig_fua = $ultima_fua->n_fua + 1;

        $patients = Patient::all();
        $rooms = Room::all();
        $shifts = Shift::all();
        $users = User::all();
        return view('orders.create', compact('patients', 'rooms', 'shifts', 'users', 'sig_fua'));
    }

    private function performValidation(Request $request)
    {
        $rules = [
           'patient_id' => 'required',
           'room_id' => 'required',
           'shift_id' => 'required',
           'covid' => 'required',
            'n_fua' => 'required'

        ];

        $messages = [
            'patient_id.required' => 'Por favor seleccionar un paciente.',
            'room_id.required' => 'Por favor seleccionar una Sala.',
            'shift_id.required' => 'Por favor seleccionar un Turno.',
            'covid.required' => 'Confirme si el paciente tiene COVID 19.',
            'n_fua.required' => 'El numero de fua es requerido.'
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidation($request);
        $existsOrdersToday = Order::where('patient_id', $request->input('patient_id'))
            ->whereDate('created_at', date('Y-m-d'))->exists();
        if ($existsOrdersToday) {
            $notification = 'Este paciente ya tiene una orden registrada hoy. Intente nuevamente mañana.';
            return back()->with(compact('notification'));
        }

        $order = Order::create($request->all());

        $orders_data = [
            'order_id' => $order->id,
            'patient' => $order->patient->name,
            'room' => $order->room->name,
            'shift' => $order->shift->name,
            'date_order' => $order->date_order
        ];

        $orders_data2 = [
            'order_id' => $order->id,
            'patient' => $order->patient->name,
            'room' => $order->room->name,
            'shift' => $order->shift->name,
            'hour_hd' => $request->hour_hd,
            'date_order' => $order->date_order
        ];

        $nurse = $order->nurse()->create($orders_data);
        $medical = $order->medical()->create($orders_data2);
        $notification = 'La orden fue creada correctamente.';
        return back()->with(compact('notification'));
    }

    public function showMedical($id)
    {
        $order = Order::findOrFail($id);
        return view('medicals.create', compact('order'));
    }

    public function showNurse($id)
    {
        $order = Order::findOrFail($id);
        return view('nurses.create', compact('order'));
    }

    public function showPdf($order)
    {
        $order = Order::findOrFail($order);
        $date = $order->created_at->format('Y-m-d');

        $pdf = PDF::loadView('orders.impresion', compact('order', 'date'));
        return $pdf->stream();
    }

    public function showPdf2020($order)
    {
        $order = Order::findOrFail($order);
        $date = $order->created_at->format('Y-m-d');

        $pdf = PDF::loadView('orders.impresion2020', compact('order', 'date'));
        return $pdf->stream();
    }

    public function recetapaciente($order)
    {
        $order = Order::findOrFail($order);

        $pdf = PDF::loadView('orders.receta', compact('order'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function fuapaciente($order)
    {
        $order = Order::findOrFail($order);
        $date = $order->created_at->format('Y-m-d');

        $pdf = PDF::loadView('orders.fua', compact('order', 'date'));
        return $pdf->stream();
    }

    public function edit($id)
    {
        $patients = Patient::all();
        $rooms = Room::all();
        $shifts = Shift::all();
        $users = User::all();
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order','patients', 'rooms', 'shifts', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->only([
            'room_id',
            'shift_id',
            'covid',
            'n_fua',
            'date_order'
        ]);
        $order->fill($data);
        $order->save();
        $data_or = [
            'room' => $order->room->name,
            'shift' => $order->shift->name,
            'date_order' => $order->date_order
        ];

        $order->nurse()->update($data_or);
        $order->medical()->update($data_or);

        $notification = 'La ordern se ha actualizado correctamente.';
        return redirect('/orders')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $orderName = $order->patient->name;
        $order->nurse->delete();
        $order->medical->delete();
        $order->delete();

        $notification = "La orden del paciente: $orderName se ha eliminado correctamente.";
        return redirect('/orders')->with(compact('notification'));
    }
}
