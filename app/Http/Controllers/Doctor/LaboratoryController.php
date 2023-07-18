<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Laboratory;
use App\Procedure;
use Carbon\Carbon;
use Illuminate\Http\Request;

use PDF;
class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date_order = $request->get('date_order');

        $laboratories = Laboratory::orderBy('id', 'desc')
            ->date_order($date_order)
            ->paginate(15);

        return view('laboratories.index', compact('laboratories'));
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
    public function edit(Laboratory $laboratory)
    {
        $procedures = Procedure::where('frequency', 'MENSUAL')->get();

        return view('laboratories.edit', compact('laboratory', 'procedures'));
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
        $laboratory = Laboratory::findOrFail($id);

        $data = $request->all();
        $laboratory->fill($data);
        $laboratory->save();

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


    public function results(Laboratory $laboratory)
    {
        $pdf = PDF::loadView('laboratories.resultados', compact('laboratory'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
