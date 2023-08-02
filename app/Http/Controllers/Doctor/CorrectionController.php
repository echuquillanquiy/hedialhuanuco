<?php

namespace App\Http\Controllers\Doctor;

use App\Correction;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use PDF;
use Symfony\Component\Routing\Annotation\Route;

class CorrectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corrections = Correction::paginate(30);

        return view('corrections.index', compact('corrections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sig_fua = 20572;

        $ultima_fua = Correction::select('serie_fua')->latest()->first();

        if (!$ultima_fua)
            $sig_fua = 20573;
        else
            $sig_fua = $ultima_fua->serie_fua + 1;


        $orders = Order::all('n_fua', 'date_order', 'type', 'user_id', 'id');
        $users = User::where('role', '=', 'doctor')->get();

        return view('corrections.create', compact('orders', 'users', 'sig_fua'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $corrections = Correction::create($request->all());

        $notification = 'La Subsanacion fue creada correctamente.';
        return back()->with(compact('notification'));
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

    public function subsanacion(Correction $correction)
    {
        $fecha_orden = $correction->order->date_order;

        list($anio, $mes, $dia) = explode('-', $fecha_orden);

        $pdf = PDF::loadView('corrections.subsanacion', compact('correction', 'dia', 'mes', 'anio'));
        return $pdf->stream();
    }
}
