<?php

namespace App\Http\Controllers\Doctor;

use App\Consult;
use App\Correction;
use App\Http\Controllers\Controller;
use App\Medicament;
use App\Numeration;
use App\Order;
use App\Patient;
use App\User;
use Illuminate\Http\Request;

use PDF;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consults = Consult::paginate(10);
        return view('consults.index', compact('consults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicaments = Medicament::all();
        $intradialisis = Medicament::all()->take(4);

        $patients = Patient::all();
        $users = User::all();

        $consult = Consult::select('id', 'n_fua')->latest()->first();

        $ultima_fua = Numeration::select('fua')->latest()->first();
        $sig_fua = $ultima_fua->fua + 1;

        return view('consults.create', compact('patients', 'sig_fua', 'users', 'medicaments', 'intradialisis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$existsOrdersToday = Consult::where('patient_id', $request->input('patient_id'))
        //    ->whereDate('created_at', date('Y-m-d'))->exists();
        //if ($existsOrdersToday) {
        //    $notification = 'Este paciente ya tiene una orden registrada hoy. Intente nuevamente mañana.';
        //    return back()->with(compact('notification'));
        //}

        $order = Order::create($request->all());
        $numerarion_save = Numeration::create([
            'fua' => $request->n_fua
        ]);

        $consults = Consult::create($request->all());

        $notification = 'La consulta fue creada correctamente.';
        return back()->with(compact('notification'));

        return view('consults.create');
    }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
