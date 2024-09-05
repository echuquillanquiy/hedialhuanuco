<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Patient;

use Carbon\carbon;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $dni = $request->get('dni');
        $code = $request->get('code');

        $patients = Patient::orderBy('surname', 'asc')
            ->name($name)
            ->dni($dni)
            ->code($code)
            ->paginate(30);


        return view('patients.index', compact('patients'));
    }

    public function create(Request $request)
    {
        return view('patients.create');
    }

    public function performValidation(Request $request)
    {
        $messages = [
            'dni.unique' => 'El número de DNI ya esta en uso.',
            'dni.digits' => 'El DNI debe tener 8 digitos.',
        ];

        $rules = [
            'name' => 'min:3',
            'dni' => 'unique:patients|digits:8',
            'code' => 'unique:patients|min:10',
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidation($request);
        Patient::create($request->only('name', 'dni', 'date_of_birth', 'sex', 'age', 'address', 'phone', 'civil_status', 'instruction', 'ocupation', 'condition', 'last_job', 'hosp_origin', 'code',
            'firstname', 'othername', 'surname', 'lastname', 'state'));

        $notification = 'El paciente se ha registrado correctamente.';
        return redirect('patients')->with(compact('notification'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'dni.digits' => 'El DNI debe tener 8 digitos.',
            'code.min' => 'El Autogenerado debe tener como mínimo 10 digitos.'
        ];

        $rules = [
            'name' => 'min:3',
            'dni' => 'digits:8',
            'code' => 'min:10',
        ];

        $this->validate($request, $rules, $messages);

        $patient = Patient::findOrFail($id);

        $data = $request->only('name', 'dni', 'date_of_birth', 'sex', 'age', 'address', 'phone', 'civil_status', 'instruction', 'ocupation', 'condition', 'hosp_origin', 'code', 'firstname', 'othername', 'surname', 'lastname', 'state');

        $patient->fill($data);
        $patient->save();

        $notification = 'La información del paciente se ha actualizado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patientName = $patient->name;
        $patient->delete();

        $notification = "El paciente $patientName se ha eliminado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }
}
