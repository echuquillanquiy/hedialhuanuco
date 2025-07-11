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

            <div class="form-group col-lg-9">
                <label for="code">Codigo (Autogenerado)</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $patient->code) }}">
            </div>

            <div class="form-group col-lg-3">
              <label for="hosp_origin">Origen</label>
              <select class="form-control" name="hosp_origin" data-toggle="select" title="Simple select" data-placeholder="Seleccione un aopción">
                  <option value="ESSALUD" {{ ($medical->hosp_origin ?? '') == 'ESSALUD' ? 'selected' : '' }}>ESSALUD</option>
                  <option value="SALUDPOL" {{ ($medical->hosp_origin ?? '') == 'SALUDPOL' ? 'selected' : '' }}>SALUDPOL</option>
                  <option value="PARTICULAR" {{ ($medical->hosp_origin ?? '') == 'PARTICULAR' ? 'selected' : '' }}>PARTICULAR</option>
              </select>
          </div>
        </div>



      {{--<div class="row">

        <div class="form-group col-lg-2">
          <label for="dni">DNI</label>
          <input type="text" name="dni" class="form-control" value="{{ old('dni', $patient->dni) }}" required>
        </div>

        <div class="form-group col-lg-2">
            <label for="date_of_birth">Fecha de nacimiento</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" onchange="Anos();" placeholder="Seleccionar fecha"
                id="date_of_birth" name="date_of_birth" type="text"
                value="{{ old('date_of_birth', $patient->date_of_birth) }}"
                data-date-format="yyyy-mm-dd" >
          </div>
        </div>

        <div class="form-group col-lg-2">
            <label for="sex">Sexo</label>
            <select class="form-control" name="sex" data-toggle="select" title="Simple select" data-placeholder="Select a state" value="{{ old('sex', $patient->sex) }}">
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>
        </div>

        <div class="form-group col-lg-1">
          <label for="age">Edad</label>
          <input type="text" name="age" id="age" class="form-control" value="{{ old('age', $patient->age) }}">
        </div>

        <div class="form-group col-lg-5">
          <label for="address">Dirección</label>
          <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}">
        </div>
      </div>

      <div class="row">

        <div class="form-group col-lg-2">
          <label for="phone">Peso Seco</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}">
        </div>

        <div class="form-group col-lg-2">
            <label for="civil_status">Estado Civil</label>
            <select class="form-control" name="civil_status" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                <option value="{{ $patient->civil_status }}">{{ $patient->civil_status }}</option>
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Conviviente">Conviviente</option>
                <option value="Viudo">Viudo</option>
                <option value="Divorciado">Divorciado</option>

            </select>
        </div>

        <div class="form-group col-lg-3">
            <label for="instruction">Grado de Instrucción</label>
            <select class="form-control" name="instruction" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                <option value="{{ $patient->instruction }}">{{ $patient->instruction }}</option>
                <option value="Analfabeto">Analfabeto</option>
                <option value="Primaria Completa">Primaria Completa</option>
                <option value="Secundadia Completa">Secundadia Completa</option>
                <option value="Técnico Completa">Técnico Completa</option>
                <option value="Universitario Completa">Universitario Completa</option>
                <option value="Primaria Incompleta">Primaria Incompleta</option>
                <option value="Secundadia Incompleta">Secundadia Incompleta</option>
                <option value="Técnico Incompleta">Técnico Incompleta</option>
                <option value="Universitario Incompleta">Universitario Incompleta</option>
            </select>
        </div>

        <div class="form-group col-lg-5">
          <label for="ocupation">Ocupación Actual</label>
          <input type="text" name="ocupation" class="form-control" value="{{ old('ocupation', $patient->ocupation) }}">
        </div>
      </div>

      <div class="row">

        <div class="form-group col-lg-8">
          <label for="condition">Justificacion de no firma</label>
          <input type="text" name="condition" class="form-control" value="{{ old('condition', $patient->condition) }}">
        </div>

        <div class="form-group col-lg-2">
            <label for="last_job">Fecha de último trabajo</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" placeholder="Seleccionar fecha"
                id="date" name="last_job" type="text"
                value="{{ old('last_job', $patient->last_job) }}"
                data-date-format="yyyy-mm-dd" >
          </div>
        </div>

        <div class="form-group col-lg-2">
          <label for="hosp_origin">N° HD</label>
          <input type="text" name="hosp_origin" class="form-control" value="{{ old('hosp_origin', $patient->hosp_origin) }}">
        </div>

      </div>

        <div class="row">


            <div class="form-group col-lg-2">
                <label for="state">ESTADO</label>
                <select class="form-control" name="state" data-toggle="select" title="Simple select" data-placeholder="Select un estado">
                    <option value="{{ $patient->state }}">{{ $patient->state }}</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>
            </div>

        </div>--}}

	  	<button type="submit" class="btn btn-primary">Guardar</button>
	  </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/edad.js') }}"></script>
@endsection
