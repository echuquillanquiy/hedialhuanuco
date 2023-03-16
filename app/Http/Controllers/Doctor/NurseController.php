<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nurse;
use App\Medical;
use App\Room;
use App\Shift;
use Monolog\Handler\IFTTTHandler;

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
        $created_at = $request->get('created_at');

        $nurses = Nurse::orderBy('created_at', 'desc')
            ->patient($patient)
            ->room($room)
            ->shift($shift)
            ->created_at($created_at)
            ->paginate(15);
        return view('nurses.index', compact('nurses','shifts', 'rooms'));
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
    public function edit($id)
    {
        $nurse = Nurse::findOrFail($id);

        //$generados = $nurse->where('patient', $nurse->patient)->count();

        /*if ($nurse->hd == null)
        {
            if ($generados == 1)
            {
                $nurse->nhd = '';
            }
            else
                $nurse->nhd = $generados;
        } else
        {
            $nurse->nhd;
        }*/

        $dayWeek = Carbon::parse($nurse->created_at)->dayOfWeek;

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

        if (!$nurse->hr)
        {
            $nurse->hr2 = $nurse->hr2;
            $nurse->hr3 = $nurse->hr3;
            $nurse->hr4 = $nurse->hr4;
            $nurse->hr5 = $nurse->hr5;
            $nurse->hr6 = $nurse->hr6;
            $nurse->hr7 = $nurse->hr7;
            $nurse->hr8 = $nurse->hr8;
        } else
        {
            if (!$nurse->hr2)
                $nurse->hr2 = Carbon::parse($nurse->hr)->addMinutes(30)->format('H:i');
            else
                $nurse->hr2 = $nurse->hr2;

            if (!$nurse->hr3)
                $nurse->hr3 = Carbon::parse($nurse->hr)->addHour(1)->format('H:i');
            else
                $nurse->hr3 = $nurse->hr3;

            if (!$nurse->hr4)
                $nurse->hr4 = Carbon::parse($nurse->hr)->addMinutes(90)->format('H:i');
            else
                $nurse->hr4 = $nurse->hr4;

            if (!$nurse->hr5)
                $nurse->hr5 = Carbon::parse($nurse->hr)->addHour(2)->format('H:i');
            else
                $nurse->hr5 = $nurse->hr5;

            if (!$nurse->hr6)
                $nurse->hr6 = Carbon::parse($nurse->hr)->addMinutes(150)->format('H:i');
            else
                $nurse->hr6 = $nurse->hr6;

            if (!$nurse->hr7)
                $nurse->hr7 = Carbon::parse($nurse->hr)->addHour(3)->format('H:i');
            else
                $nurse->hr7 = $nurse->hr7;

            if ($nurse->order->medical->hour_hd == '3.15')
                {
                    $nurse->hr8 = Carbon::parse($nurse->hr)->addMinutes(195)->format('H:i');
                }
            elseif ($nurse->order->medical->hour_hd == '3.75')
                {
                    $nurse->hr8 = Carbon::parse($nurse->hr)->addMinutes(225)->format('H:i');
                }
            else
            {
                $nurse->hr8 = Carbon::parse($nurse->hr)->addMinutes(210)->format('H:i');
            }
        }

        $patient = $nurse->patient;
        $fecha = Carbon::now();
        $ultimo = $nurse->where('patient', $patient)->whereDate('created_at', '!=', $fecha)->latest()->first();
        $ult = $ultimo ? $ultimo->nhd : 0;
        $nurse->nhd = $ult + 1;

        return view('nurses.edit', compact('nurse', 'ult'));
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
        $nurse = Nurse::findOrFail($id);

        $data = $request->all();

        $nurse->fill($data);
        $nurse->save();

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
