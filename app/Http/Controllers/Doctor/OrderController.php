<?php

namespace App\Http\Controllers\Doctor;

use App\Numeration;
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
        //$ultima_fua= Order::select('n_fua', 'date_order')->whereDate('date_order', '>=', $fecha)->latest()->first();

        $ultima_fua = Numeration::select('fua')->latest()->first();
        $sig_fua = $ultima_fua->fua + 1;

        /*if ($ultima_fua == null)
           $sig_fua = 5000;
        else
            $sig_fua = $ultima_fua->n_fua + 1;*/

        $patients = Patient::where('state', '=', 'ACTIVO')->get();
        $rooms = Room::all();
        $shifts = Shift::all();
        $users = User::all();
        return view('orders.create', compact('patients', 'rooms', 'shifts', 'users', 'sig_fua'));
    }

    private function performValidation(Request $request)
    {
        $rules = [
           'patient_id' => 'required',
           'shift_id' => 'required',
           'covid' => 'required',

        ];

        $messages = [
            'patient_id.required' => 'Por favor seleccionar un paciente.',
            'shift_id.required' => 'Por favor seleccionar un Turno.',
            'covid.required' => 'Confirme si el paciente tiene COVID 19.',
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidation($request);
        //$existsOrdersToday = Order::where('patient_id', $request->input('patient_id'))
            //->whereDate('date_order', date('Y-m-d'))->exists();

        //if ($existsOrdersToday) {
            //$notification = 'Este paciente ya tiene una orden registrada hoy. Intente nuevamente mañana.';
            //return back()->with(compact('notification'));
        //}

        $order = Order::create($request->all());

        $orders_data = [
            'order_id' => $order->id,
            'patient' => $order->patient->firstname . ' ' . $order->patient->othername . ' ' . $order->patient->surname . ' ' . $order->patient->lastname,
            'shift' => $order->shift->name,
            'date_order' => $order->date_order,
            'start_weight' => $request->start_weight,
            'end_weight' => $request->end_weight,
            'nhd' => $request->nhd,
            'user_id' => $order->user_id,
        ];

        $orders_data2 = [
            'order_id' => $order->id,
            'patient' => $order->patient->firstname . ' ' . $order->patient->othername . ' ' . $order->patient->surname . ' ' . $order->patient->lastname,
            'shift' => $order->shift->name,
            'start_hour' => $request->start_hour,
            'end_hour' => $request->end_hour,
            'date_order' => $order->date_order,
            'start_weight' => $request->start_weight,
            'user_id' => $order->user_id,
        ];

        $consult_data = [
            'order_id' => $order->id,
            'patient_id' => $order->patient_id,
            'date_order' => $order->date_order,
            'user_id' => $order->user_id,
        ];

        $patient = Patient::findOrFail($request->patient_id);
        if ($patient)
        {
            $patient->hosp_origin = $request->hosp_origin;
            $patient->save();
        }

        if ($order->type == 1 && $order->lab == 'SI')
        {
            $nurse = $order->nurse()->create($orders_data);
            $medical = $order->medical()->create($orders_data2);
            $laboratory = $order->laboratory()->create($consult_data);
            $notification = 'La orden fue creada correctamente.';
            return back()->with(compact('notification'));

        } elseif ($order->type == 1)
        {
            $nurse = $order->nurse()->create($orders_data);
            $medical = $order->medical()->create($orders_data2);
            $notification = 'La orden fue creada correctamente.';
            return back()->with(compact('notification'));

        } else {
            $nephrology = $order->nephrology()->create($consult_data);
            $recipe = $order->recipe()->create($consult_data);
            $notification = 'La consulta nefrologica fue creada correctamente.';
            return back()->with(compact('notification'));
        }

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

        $pdf = PDF::loadView('orders.impresion2020', compact('order'));
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
        $order = Order::findOrFail($id);

        $patients = Patient::all();
        $rooms = Room::all();
        $shifts = Shift::all();
        $users = User::all();
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
            'shift_id',
            'covid',
            'n_fua',
            'date_order',
            'lab'
        ]);
        $order->fill($data);
        $order->save();
        $data_or = [
            'shift' => $order->shift->name,
            'date_order' => $order->date_order,
            'start_hour' => $request->start_hour,
            'end_hour' => $request->end_hour,
            'start_weight' => $request->start_weight,
        ];

        $data_or2 = [
            'shift' => $order->shift->name,
            'date_order' => $order->date_order,
            'start_weight' => $request->start_weight,
            'end_weight' => $request->end_weight
        ];

        $consult_data = [
            'order_id' => $order->id,
            'patient_id' => $order->patient_id,
            'date_order' => $order->date_order,
        ];

        if ($order->lab == 'SI')
        {
            $laboratory = $order->laboratory()->create($consult_data);
        }

        $order->nurse()->update($data_or2);
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
        $order->laboratory->delete();
        $order->recipe->delete();
        $order->nephrology->delete();
        $order->delete();

        $notification = "La orden del paciente: $orderName se ha eliminado correctamente.";
        return redirect('/orders')->with(compact('notification'));
    }
}
