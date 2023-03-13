<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use ZipStream\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $dni = $request->get('dni');

        $users = User::orderBy('id', 'desc')
            ->name($name)
            ->email($email)
            ->dni($dni)
            ->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'dni.unique' => 'El número DNI ya esta en uso.',
            'dni.digits' => 'El DNI debe tener 8 digitos.',
            'dni.required' => 'El número de DNI es requerido',
            'email.unique' => 'El correo ya está en uso.',
            'email.required' => 'Debe colocar un email valido.',
            'code_specialty.unique' => 'El código ya está en uso.',
            'code_specialty.min' => 'El código debe tener como mínimo 3 digitos.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'email' => 'unique:users|required|email',
            'dni' => 'required|unique:users|digits:8',
            'code_specialty' => 'unique:users||min:3',
            'role' => 'required|min:3',
            'image' => 'image|max:2048'
        ];

        $this->validate($request, $rules, $messages);

        $firmas = $request->file('image')->store('public/firmas');
        $url = Storage::url($firmas);

        User::create(

            $request->only('name', 'email', 'dni', 'code_specialty', 'rne', 'role')
            + [
                'password' => bcrypt($request->input('password')),
                'image' => $url
            ]
        );

        $notification = 'El usuario se ha registrado correctamente.';
        return redirect('/users')->with(compact('notification'));
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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

        $messages = [
            'dni.digits' => 'El DNI debe tener 8 digitos.',
            'code_specialty.min' => 'El código debe tener como mínimo 3 digitos.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'code_specialty' => 'nullable|min:5',
            'role' => 'required|min:3',
            'image' => 'max:2048'
        ];

        $this->validate($request, $rules, $messages);

        $user = User::findOrFail($id);

        $data = $request->only('name', 'email', 'dni', 'code_specialty', 'rne', 'role', 'image');
        $password = $request->input('password');
        if ($password)
            $data ['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información del usuario se ha registrado correctamente.';
        return redirect('/users')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userName = $user->name;
        $user->delete();

        $notification = "El usuario $userName se ha eliminado correctamente.";
        return redirect('/users')->with(compact('notification'));
    }
}
