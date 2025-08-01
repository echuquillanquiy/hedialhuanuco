<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nurse;
use App\Medical;
use App\Room;
use App\User;
use App\Shift;
use App\Order;
use App\Patient;
use Monolog\Handler\IFTTTHandler;
use PhpParser\Node\Stmt\DeclareDeclare;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $rooms = Room::all();
    $shifts = Shift::all();

    $patient = $request->get('patient');
    $room = $request->get('room');
    $shift = $request->get('shift');
    $hour_hd = $request->get('hour_hd');
    $date_order = $request->get('date_order');
    $estado = $request->get('estado'); // 👈 nuevo

    // Detectamos si hay filtros activos
    $hasFilters = $patient || $room || $shift || $hour_hd || $date_order || $estado;

    $nurses = Nurse::select('nurses.*')
        ->join('orders', 'nurses.order_id', '=', 'orders.id')
        ->join('patients', 'orders.patient_id', '=', 'patients.id');

    // Filtro por fecha
    if ($date_order) {
        $nurses->whereDate('nurses.date_order', $date_order);
    }

    // Mostrar solo atenciones del día y estado PENDIENTE si no hay filtros
    if (!$hasFilters) {
        $nurses->whereDate('nurses.date_order', Carbon::today()->toDateString())
               ->where('nurses.estado', 'PENDIENTE');
    }

    // Filtro por estado
    if ($estado) {
        $nurses->where('nurses.estado', $estado);
    }

    // Filtro por paciente
    if ($patient) {
        $nurses->where(function ($query) use ($patient) {
            $query->where('patients.surname', 'like', "%$patient%")
                  ->orWhere('patients.lastname', 'like', "%$patient%")
                  ->orWhere('patients.firstname', 'like', "%$patient%")
                  ->orWhere('patients.othername', 'like', "%$patient%");
        });
    }

    // Otros filtros
    if ($room) {
        $nurses->where('nurses.room', $room);
    }

    if ($shift) {
        $nurses->where('nurses.shift', $shift);
    }

    if ($hour_hd) {
        $nurses->where('nurses.hour_hd', $hour_hd);
    }

    // Ordenamiento
    $nurses = $nurses
        ->orderBy('nurses.shift', 'desc')
        ->orderByRaw('CAST(nurses.position AS UNSIGNED)')
        ->orderBy('patients.surname', 'asc')
        ->orderBy('patients.lastname', 'asc')
        ->orderBy('patients.firstname', 'asc')
        ->orderBy('patients.othername', 'asc')
        ->paginate(30)
        ->appends($request->all()); // 👈 mantiene filtros al paginar

    return view('nurses.index', compact('nurses', 'rooms', 'shifts'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(Order $order)
    {
        return view('nurses.create', compact('order'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $existsNursesToday = Nurse::where('patient', $request->input('patient'))
            ->whereDate('created_at', date('Y-m-d'))->exists();

        // $from = '2019-08-01';
        // $to = $request->input();
        // ->whereBetween('created_at', [$from, $to])

        if ($existsNursesToday) {
            $notification = 'Este paciente ya tiene un parte de enfermeria registrada hoy. Intente nuevamente mañana.';
            return redirect('/medicals/')->with(compact('notification'));
        }

        Nurse::create($request->all());

        $notification = 'El Parte de enfermeria se ha registrado correctamente.';
        return redirect('/nurses')->with(compact('notification'));
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

        $ultimaOrdenNoVacia = Nurse::where('patient', $patient)
            ->where('date_order', '<', $fecha)
            ->whereNotNull('frequency') // Asegurar que 'detalles' no esté nulo
            ->where('frequency', '!=', '') // Asegurar que 'detalles' no esté vacío
            ->orderBy('date_order', 'desc')
            ->first();

        return $ultimaOrdenNoVacia;
    }

    public function edit($id)
    {
        $users = User::where('role', '=', 'enfermera')->get();

        $nurse = Nurse::findOrFail($id);
        $patient = $nurse->patient;
        $fecha = $nurse->date_order;

        $dayWeek = Carbon::parse($nurse->date_order)->dayOfWeek;

        if ($nurse->others == null)
        {
            if ($dayWeek == 1 || $dayWeek == 3 || $dayWeek == 5)
            {
                $nurse->others = "L - M - V";
            } else
            {
                $nurse->others = "M - J - S";
            }
        } else
        {
            $nurse->others = $nurse->others;
        }

        $ultimaOrdenNoVacia = $this->obtenerUltimaOrdenNoVaciaYSumar($patient, $fecha);

        /*if (!$nurse->hr)
        {
            $nurse->hr2 = $nurse->hr2;
            $nurse->hr3 = $nurse->hr3;
            $nurse->hr4 = $nurse->hr4;
            $nurse->hr5 = $nurse->hr5;
        }
        else
        {
            if (!$nurse->hr2)
                $nurse->hr2 = Carbon::parse($nurse->hr)->addHour(1)->format('H:i');
            else
                $nurse->hr2 = $nurse->hr2;

            if (!$nurse->hr3)
                $nurse->hr3 = Carbon::parse($nurse->hr)->addHour(2)->format('H:i');
            else
                $nurse->hr3 = $nurse->hr3;

            if (!$nurse->hr4)
                $nurse->hr4 = Carbon::parse($nurse->hr)->addHour(3)->format('H:i');
            else
                $nurse->hr4 = $nurse->hr4;

            if (!$nurse->hr5) {
                if ($nurse->order->medical->hour_hd == '3')
                {
                    $nurse->hr5 = '';
                }
                elseif ($nurse->order->medical->hour_hd == '3.25')
                {
                    $nurse->hr5 = Carbon::parse($nurse->hr)->addMinutes(195)->format('H:i');
                }
                elseif ($nurse->order->medical->hour_hd == '3.5')
                {
                    $nurse->hr5 = Carbon::parse($nurse->hr)->addMinutes(210)->format('H:i');
                }
                elseif ($nurse->order->medical->hour_hd == '3.75')
                {
                    $nurse->hr5 = Carbon::parse($nurse->hr)->addMinutes(225)->format('H:i');
                }
                else{
                    $nurse->hr5 = Carbon::parse($nurse->hr)->addHour(4)->format('H:i');;
                }
            }
        }*/

        return view('nurses.edit', compact('nurse', 'users', 'ultimaOrdenNoVacia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function performValidation (Request $request) {
        $rules = [
            /*'position' => 'required',
            'machine' => 'required',
            'access_arterial' => 'required',
            'access_venoso' => 'required',
            's' => 'required',
            'end_observation' => 'required',
            'end_pa' => 'required',
            'end_weight' => 'required',*/
            /*'cnd' => [
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 12.1 || $value >= 15) {
                        $fail("El campo $attribute debe estar entre 12.1 y 15.");
                    }
                },
            ],
            'cnd2' => [
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 12.1 || $value >=15) {
                        $fail("El campo $attribute debe estar entre 12.1 y 15.");
                    }
                },
            ],
            'cnd3' => [
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 12.1 || $value >=15) {
                        $fail("El campo $attribute debe estar entre 12.1 y 15.");
                    }
                },
            ],
            'cnd4' => [
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 12.1 || $value >=15) {
                        $fail("El campo $attribute debe estar entre 12.1 y 15.");
                    }
                },
            ],*/


            /*VALIDACION TRATAMIENTOS
            'hr' => 'required',
            'pa' => 'required',
            'fc1' => 'required',
            'qb' => 'required',
            'cnd' => 'required',
            'ra' => 'required',
            'rv' => 'required',
            'ptm' => 'required',
            'sol_hemodev' => 'required',
            'obs' => 'required',
            'hr2' => 'required',
            'pa2' => 'required',
            'fc2' => 'required',
            'qb2' => 'required',
            'cnd2' => 'required',
            'ra2' => 'required',
            'rv2' => 'required',
            'ptm2' => 'required',
            'sol_hemodev2' => 'required',
            'obs2' => 'required',
            'hr3' => 'required',
            'pa3' => 'required',
            'fc3' => 'required',
            'qb3' => 'required',
            'cnd3' => 'required',
            'ra3' => 'required',
            'rv3' => 'required',
            'ptm3' => 'required',
            'sol_hemodev3' => 'required',
            'obs3' => 'required',
            'hr4' => 'required',
            'pa4' => 'required',
            'fc4' => 'required',
            'qb4' => 'required',
            'cnd4' => 'required',
            'ra4' => 'required',
            'rv4' => 'required',
            'ptm4' => 'required',
            'sol_hemodev4' => 'required',
            'obs4' => 'required',
            'hr5' => 'required',
            'pa5' => 'required',
            'fc5' => 'required',
            'qb5' => 'required',
            'cnd5' => 'required',
            'ra5' => 'required',
            'rv5' => 'required',
            'ptm5' => 'required',
            'sol_hemodev5' => 'required',
            'obs5' => 'required'*/
        ];

        $messages = [
            //'position.required' => 'Obligatorio',
            //'machine.required' => 'Obligatorio',
            //'access_arterial.required' => 'Obligatorio',
            //'access_venoso.required' => 'Obligatorio',
            //'s.required' => 'Obligatorio',
            //'end_observation.required' => 'Obligatorio',
            //'end_pa.required' => 'Obligatorio',
            //'end_weight.required' => 'Obligatorio',
            //'cnd.numeric' => 'La conductividad debe estar entre 12.1 hasta 15'
        ];

        $this->validate($request, $rules, $messages);
    }
    public function update(Request $request, $id)
    {
        $nurse = Nurse::findOrFail($id);
        //$this->performValidation($request);

        $data = $request->all();

        $nurse->fill($data);
        $nurse->save();

        // Obtener paciente desde la orden relacionada
        $order = Order::find($nurse->order_id);
        if ($order) {
            $patient = Patient::find($order->patient_id);
            if ($patient) {
                // Guardar campos en patient
                $patient->acceso1 = $request->input('access_arterial');
                $patient->acceso2 = $request->input('access_venoso');
                $patient->save();
            }
        }
        

        $notification = 'El Parte de enfermeria se ha actualizado correctamente.';
        return back()->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Nurse $nurse)
    {
        $nurseHcl = $nurse->hcl;
        $nurse->delete();

        $notification = "La historia de enfermeria $nurseHcl se ha eliminado correctamente.";
        return redirect('/nurses')->with(compact('notification'));
    }*/
}
