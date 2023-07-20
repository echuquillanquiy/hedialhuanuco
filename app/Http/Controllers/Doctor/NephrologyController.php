<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Nephrology;
use Illuminate\Http\Request;

use PDF;

class NephrologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nephrologies = Nephrology::orderBy('created_at', 'desc')
            ->paginate(15);

        return view('nephrologies.index', compact('nephrologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Nephrology $nephrology)
    {
        return view('nephrologies.edit', compact('nephrology'));
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
        $nephorology = Nephrology::findOrFail($id);

        $data = $request->all();
        $nephorology->fill($data);
        $nephorology->save();

        $notification = 'Se ha guardado los examenes correctamente.';
        return back()->with(compact('notification'));
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

    public function consulta(Nephrology $nephrology)
    {
        $pdf = PDF::loadView('nephrologies.consult', compact('nephrology'));
        return $pdf->stream();
    }

    public function fua(Nephrology $nephrology)
    {
        $pdf = PDF::loadView('nephrologies.fuaconsulta', compact('nephrology'));
        return $pdf->stream();
    }
}
