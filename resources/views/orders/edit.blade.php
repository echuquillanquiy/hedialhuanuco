@extends('layouts.panel')

@section('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@endsection

@section('content')
<form action="{{ url('orders/'.$order->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Orden</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('orders') }}" class="btn btn-sm btn-default">
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

      @if (session('errors'))
      <div class="alert alert-danger" role="alert">
        Los cambios se han guardado pero tener en cuenta que:
        <ul>
          @foreach (session('errors') as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif



      <div class="row">
        <div class="form-group col-sm-12 col-lg-4">
        <label for="name">Nombres y Apellidos</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $order->patient->name) }}" disabled>
      </div>

          <div class="form-group col-lg-2">
              <label for="">FECHA DE CREACION</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input class="form-control datepicker" placeholder="Seleccionar fecha"
                         id="date_order" name="date_order" type="text"
                         value="{{ $order->date_order }}"
                         data-date-format="yyyy-mm-dd"
                  >
              </div>
          </div>

          <div class="form-group col-sm-12 col-lg-1">
              <label for="hosp_origin">N° HD</label>
              <input type="text" id="hosp_origin" name="hosp_origin" class="form-control" value="{{ $order->patient->hosp_origin }}">
          </div>

        <div class="form-group col-sm-12 col-lg-3">
          <label for="shift_id">Turnos</label>
          <select name="shift_id" id="shift_id" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
            <option value="{{ $order->shift->id }}">{{ $order->shift->name }}</option>
            @foreach ($shifts as $shift)
            <option value="{{ $shift->id }}">{{ $shift->name }}</option>

            @endforeach
          </select>
        </div>

          <div class="form-group col-sm-12 col-lg-2">
              <label for="covid">COVID</label>
              <select name="covid" id="covid" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
                  <option value="{{ $order->covid }}" disabled selected>{{ $order->covid }}</option>
                  <option value="NO">NO</option>
                  <option value="SI">SI</option>
              </select>
          </div>


          <div class="form-group col-sm-12 col-lg-2">
              <label for="start_weight">Peso Inicial</label>
              <input type="text" name="start_weight" class="form-control" value="{{ $order->medical->start_weight }}">
          </div>

          <div class="form-group col-sm-12 col-lg-2">
              <label for="end_weight">Peso Final</label>
              <input type="text" name="end_weight" class="form-control" value="{{ $order->nurse->end_weight }}">
          </div>

          <div class="form-group col-sm-12 col-lg-2">
              <label for="start_hour">Hora médico Inicial</label>
              <input type="time" name="start_hour" class="form-control" value="{{ $order->medical->start_hour }}">
          </div>

          <div class="form-group col-sm-12 col-lg-2">
              <label for="end_hour">Hora médico Final</label>
              <input type="time" name="end_hour" class="form-control" value="{{ $order->medical->end_hour }}">
          </div>

          <input type="hidden" name="n_fua" class="form-control" value="">

        <div class="form-group">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endsection
