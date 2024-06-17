<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Numeration;
use App\Order;
use Illuminate\Http\Request;

class NumerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numerations = Numeration::orderBy('fua', 'desc')
        ->paginate(60);

        return view('numerations.index', compact('numerations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('numerations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function performValidation(Request $request)
    {
        $rules = [
            'fua' => 'unique:numerations',
        ];

        $messages = [
            'fua.unique' => 'EL NUMERO DE FUA ES UNICO E IRREPETIBLE INTENTA NUEVAMENTE.',
        ];

        $this->validate($request, $rules, $messages);
    }
    public function store(Request $request)
    {
        $this->performValidation($request);

        $numeration = Numeration::create($request->all());

        $notification = 'Serie registrada correctamente.';
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
}
