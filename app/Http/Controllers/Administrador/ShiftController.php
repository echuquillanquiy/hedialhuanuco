<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Shift;

use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    public function index()
    {
    	$shifts = Shift::all();
    	return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
    	return view('shifts.create');
    }

    private function performValidation(Request $request)
    {
        $rules = [
            'name' => 'required|min:1',
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'El nombre del turno debe tener 6 carácteres.',
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
    	//dd($request->all());

        $this->performValidation($request);

    	$shift = new Shift();
    	$shift->name = $request->input('name');
    	$shift->description = $request->input('description');
    	$shift->save();

    	$notification = 'La sala se a registrado correctamente.';

        return redirect('/shifts')->with(compact('notification'));
    }

    public function edit (Shift $shift)
    {

        return view('shifts.edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        //dd($request->all());
        $this->performValidation($request);

        $shift->name = $request->input('name');
        $shift->description = $request->input('description');
        $shift->save();

        $notification = 'La sala se a actualizado correctamente.';

        return redirect('/shifts')->with(compact('notification'));
    }

    public function destroy(Shift $shift)
    {
        $deleteShift = $shift->name;
        $shift->delete();

        $notification = 'El turno '.$deleteShift .' se a eliminado correctamente.';
        return redirect('/shifts')->with(compact('notification'));
    }
}
