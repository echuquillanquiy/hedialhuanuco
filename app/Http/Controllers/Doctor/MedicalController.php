<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Medical;
use App\Order;
use App\Room;
use App\Shift;
use App\Patient;


use App\Http\Controllers\Controller;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = Order::all();
        $rooms = Room::all();
        $shifts = Shift::all();

        $patient = $request->get('patient');
        $room = $request->get('room');
        $shift = $request->get('shift');
        $hour_hd = $request->get('hour_hd');
        $date_order = $request->get('date_order');

        $hasFilters = $patient || $room || $shift || $hour_hd || $date_order;

        $medicals = Medical::select('medicals.*')
            ->join('orders', 'medicals.order_id', '=', 'orders.id')
            ->join('patients', 'orders.patient_id', '=', 'patients.id');

        // Si se aplicó algún filtro por fecha, se respeta
        if ($date_order) {
            $medicals->whereDate('medicals.date_order', $date_order);
        }

        // Si no hay ningún filtro, mostrar solo los de hoy
        if (!$hasFilters) {
            $medicals->whereDate('medicals.date_order', Carbon::today()->toDateString());
        }

        // Filtro por paciente
        if ($patient) {
            $medicals->where(function($query) use ($patient) {
                $query->where('patients.surname', 'like', "%$patient%")
                    ->orWhere('patients.lastname', 'like', "%$patient%")
                    ->orWhere('patients.firstname', 'like', "%$patient%")
                    ->orWhere('patients.othername', 'like', "%$patient%");
            });
        }

        // Filtros adicionales
        if ($room) {
            $medicals->where('medicals.room', $room);
        }

        if ($shift) {
            $medicals->where('medicals.shift', $shift);
        }

        if ($hour_hd) {
            $medicals->where('medicals.hour_hd', $hour_hd);
        }

        // Ordenar por nombres
        $medicals = $medicals
            ->orderBy('patients.surname', 'asc')
            ->orderBy('patients.lastname', 'asc')
            ->orderBy('patients.firstname', 'asc')
            ->orderBy('patients.othername', 'asc')
            ->paginate(30);

        return view('medicals.index', compact('medicals', 'order', 'rooms', 'shifts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        return view('medicals.create');
    }*/

    public function performValidation (Request $request) {

        $rules = [
            'clinical_trouble' => 'required',
            'signal' => 'required',
            'start_pa' => 'required',
            'fc' => 'required',
            'hour_hd' => 'required',

            'start_weight' => 'required',
            'dry_weight' => 'required',
            'uf' => 'required',
            'qb' => 'required',
            'qd' => 'required',
            'bicarbonat' => 'required',
            'cnd' => 'required',
            'start_na' => 'required',
            'end_na' => 'required',
            'profile_na' => 'required',
            'profile_uf' => 'required',
            'area_filter' => 'required',
            'membrane' => 'required',
            'end_evaluation' => 'required',
            'heparin' => 'required',
        ];

        $messages = [
            'clinical_trouble.required' => 'Obligatorio',
            'signal.required' => 'Obligatorio',
            'start_pa.required' => 'Obligatorio',
            'fc.required' => 'Obligatorio',
            'hour_hd.required' => 'Obligatorio',

            'start_weight.required' => 'Obligatorio',
            'dry_weight.required' => 'Obligatorio',
            'uf.required' => 'Obligatorio',
            'qb.required' => 'Obligatorio',
            'qd.required' => 'Obligatorio',
            'bicarbonat.required' => 'Obligatorio',
            'cnd.required' => 'Obligatorio',
            'start_na.required' => 'Obligatorio',
            'end_na.required' => 'Obligatorio',
            'profile_na.required' => 'Obligatorio',
            'profile_uf.required' => 'Obligatorio',
            'area_filter.required' => 'Obligatorio',
            'membrane.required' => 'Obligatorio',
            'end_evaluation.required' => 'Obligatorio',
            'heparin.required' => 'Este campo es Obligatorio',
        ];

        $this->validate($request, $rules, $messages);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //$this->performValidation($request);
        $existsMedicalsToday = Medical::where('patient', $request->input('patient'))
            ->whereDate('created_at', date('Y-m-d'))->exists();

        // $from = '2019-08-01';
        // $to = $request->input();
        // ->whereBetween('created_at', [$from, $to])

        if ($existsMedicalsToday) {
            $notification = 'Este paciente ya tiene un parte medico registrada hoy. Intente nuevamente mañana.';
            return redirect('/medicals/')->with(compact('notification'));
        }

        Medical::create($request->all());

        $notification = 'El Parte médico se ha registrado correctamente.';
        return redirect('/medicals')->with(compact('notification'));
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function obtenerUltimaOrdenNoVaciaYSumar($patient, $fecha)
    {
        $fecha = Carbon::parse($fecha)->format('Y-m-d');

        $ultimaOrdenNoVacia = Medical::where('patient', $patient)
            ->where('date_order', '<', $fecha)
            ->whereNotNull('hour_hd') // Asegurar que 'detalles' no esté nulo
            ->where('hour_hd', '!=', '') // Asegurar que 'detalles' no esté vacío
            ->orderBy('date_order', 'desc')
            ->first();

        return $ultimaOrdenNoVacia;
    }
    public function edit($id)
    {
        $medical = Medical::findOrFail($id);
        $users = User::where('role', '=', 'doctor')->get();

        $patient = $medical->patient;
        $fecha = $medical->date_order;
        $ultimaOrdenNoVacia = $this->obtenerUltimaOrdenNoVaciaYSumar($patient, $fecha);

        return view('medicals.edit', compact('medical', 'users', 'ultimaOrdenNoVacia'));

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
        $this->performValidation($request);
        $medical = Medical::findOrFail($id);

        $data = $request->all();

        $medical->fill($data);
        $medical->save();



        $notification = 'El Parte Médico se ha actualizado correctamente.';
        return back()->with(compact('notification'));
    }

    public function fissalweb(Request $request)
    {
        $order = Order::all();
        $patients = Patient::all();

        $patient = $request->get('patient');
        $created_at = $request->get('created_at');
        $date_order = $request->get('date_order');


        $medicals = Medical::orderBy('patient', 'asc')
            ->orderBy('date_order', 'asc')
            ->patient($patient)
            ->created_at($created_at)
            ->date_order($date_order)
            ->paginate(30);
        return view('medicals.fissal', compact('medicals', 'order', 'patients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Medical $medical)
    {
        $medicalId = $medical->id;
        $medical->delete();

        $notification = "El parte medico N° $medicalId se ha eliminado correctamente.";
        return redirect('/medicals')->with(compact('notification'));
    }*/
}
