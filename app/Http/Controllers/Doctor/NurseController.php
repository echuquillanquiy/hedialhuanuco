<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nurse;
use App\Medical;
use App\Room;
use App\Shift;

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

        $generados = $nurse->where('patient', $nurse->patient)->count();

        if ($nurse->hd == null)
        {
            if ($generados == 1)
            {
                $nurse->nhd = 1;
            }
            else
                $nurse->nhd = $generados;
        } else
        {
            $nurse->nhd = $nurse->nhd;
        }


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



        return view('nurses.edit', compact('nurse'));
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
