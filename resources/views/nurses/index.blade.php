@extends('layouts.panel')

@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h1 class="mb-0">Enfermeria</h1>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if (session('notification'))
      <div class="alert alert-success" role="alert">
        <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
        {{ session('notification') }}
      </div>
    @endif
  </div>

  <div class="card-body">
    <form action="{{ url('nurses') }}" method="GET">
      <div class="row">

        <div class="col-lg-4">
          <div class="form-group">
            <label for="patient">Nombres y Apellidos</label>
            <input type="text" name="patient" class="form-control" value="{{ old('patient') }}" autofocus>
          </div>
        </div>

        <div class="form-group col-sm-12 col-lg-2">
          <label for="room">Salas</label>
          <select data-live-search="true" name="room" id="room" class="form-control selectpicker" data-style="btn-info">
            <option></option>
            @foreach ($rooms as $room)
            <option value="{{ $room->name }}">{{ $room->name }}</option>

            @endforeach
          </select>
        </div>

        <div class="form-group col-sm-12 col-lg-3">
          <label for="shift">Turnos</label>
          <select name="shift" id="shift" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
            <option></option>
            @foreach ($shifts as $shift)
            <option value="{{ $shift->name }}">{{ $shift->name }}</option>

            @endforeach
          </select>
        </div>

        <div class="form-group col-lg-3">
            <label for="created_at">Fecha</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" placeholder="Seleccionar fecha" 
                id="created_at" name="created_at" type="text" 
                value="{{ old('date', date('Y-m-d')) }}" 
                data-date-format="yyyy-mm-dd" 
                >
          </div>
        </div>


      </div>
      <button class="btn btn-info btn-sm" type="submit">Buscar</button>
    </form>
  </div>
  
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombres y Apellidos</th>
	<th scope="col">Opciones</th>
	     <th scope="col">DNI</th>
	     <th scope="col">HD Inicio</th>
	     <th scope="col">HD Fin</th>
	     <th scope="col">Hierro</th>
	     <th scope="col">Epo2000</th>
	     <th scope="col">Epo4000</th>
	     <th scope="col">Vit B12</th>
          <th scope="col">Sala</th>
          <th scope="col">Turno</th>
          <th>Fecha de CreaciÃ³n</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($nurses as $nurse)
        <tr>

	  <th scope="row">
            {{$nurse->patient}}
          </th>

<td>
            
            <form action="{{ url('/nurses/'.$nurse->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <a href="{{ url('/nurses/'.$nurse->id.'/edit') }}" class="btn btn-sm btn-success">Registrar</a>
            </form>
          </td>

          <th scope="row">
            {{$nurse->order->patient->dni}}
          </th>

          <th scope="row">
            {{$nurse->hr}}
          </th>


          <th scope="row">
            {{$nurse->hr8}}
          </th>

	  <th scope="row">
            @if ($nurse->iron > 0) 1 @else 0 @endif
          </th>

<th scope="row">
            @if ($nurse->epo2000 > 0) 1 @else 0 @endif
          </th>
<th scope="row">
            @if ($nurse->epo4000  > 0) 1 @else 0 @endif
          </th>
<th scope="row">
            @if ($nurse->hidroxi  > 0) 1 @else 0 @endif
          </th>

          <td>
            {{$nurse->room}}
          </td>
          <td>
            {{$nurse->shift}}
          </td>
          <td>
	    {{ \Carbon\Carbon::parse($nurse->created_at)->format('d/m/Y')}}
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-body">
    {{ $nurses->appends($_GET)->links() }}
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection