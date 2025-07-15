@extends('layouts.panel')

@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Editar paciente</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients') }}" class="btn btn-sm btn-default">
          Cancelar y volver
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

  	<form action="{{ url('patients/'.$patient->id) }}" method="POST">
  		@csrf
      @method('PUT')
	  	<div class="row">

            <div class="form-group col-lg-2">
                <label for="dni">HCL N°</label>
                <input type="text" name="dni" class="form-control" value="{{ old('dni', $patient->dni) }}" required>
            </div>

            <div class="form-group col-lg-2">
                <label for="firstname">Primer Nombre</label>
                <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $patient->firstname) }}" required>
            </div>

            <div class="form-group col-lg-2">
                <label for="othername">Otros Nombres</label>
                <input type="text" name="othername" class="form-control" value="{{ old('othername', $patient->othername) }}">
            </div>

            <div class="form-group col-lg-3">
                <label for="surname">Primer Apellido</label>
                <input type="text" name="surname" class="form-control" value="{{ old('surname', $patient->surname) }}" required>
            </div>

            <div class="form-group col-lg-3">
                <label for="lastname">Segundo Apellido</label>
                <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $patient->lastname) }}" required>
            </div>

            <div class="form-group col-lg-3">
                <label for="documento">DNI</label>
                <input type="text" name="documento" class="form-control" value="{{ old('documento', $patient->documento) }}" required>
            </div>

            <div class="form-group col-lg-6">
                <label for="code">Codigo (Autogenerado)</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $patient->code) }}">
            </div>

            <div class="form-group col-lg-3">
              <label for="last_job">Origen</label>
              <select class="form-control" name="last_job" data-toggle="select" title="Simple select" data-placeholder="Seleccione una opción">
                  <option value="ESSALUD" {{ ($medical->last_job ?? '') == 'ESSALUD' ? 'selected' : '' }}>ESSALUD</option>
                  <option value="SALUDPOL" {{ ($medical->last_job ?? '') == 'SALUDPOL' ? 'selected' : '' }}>SALUDPOL</option>
                  <option value="PARTICULAR" {{ ($medical->last_job ?? '') == 'PARTICULAR' ? 'selected' : '' }}>PARTICULAR</option>
              </select>
            </div>

            <div class="form-group col-lg-6">
                <label for="acceso1">ACCESO ARTERIAL</label>
                <input type="text" name="acceso1" class="form-control" value="{{ old('acceso1', $patient->acceso1) }}">
            </div>

            <div class="form-group col-lg-6">
                <label for="acceso2">ACCESO VENOSO</label>
                <input type="text" name="acceso2" class="form-control" value="{{ old('acceso2', $patient->acceso2) }}">
            </div>
        </div>

	  	<button type="submit" class="btn btn-primary">Guardar</button>
	  </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/edad.js') }}"></script>
@endsection
