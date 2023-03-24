@extends('layouts.panel')

@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Medicina</h3>
      </div>
    </div>
  </div>

  <div class="card-body">
    <form action="{{ url('medicals') }}" method="GET">
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
                value="{{ old('date') }}"
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
          <th scope="col">id</th>
          <th scope="col">Nombres y Apellidos</th>
          <th scope="col">Sala</th>
          <th scope="col">Turno</th>
          <th scope="col">HORAS HD</th>
          <th>Fecha de Creación</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($medicals as $medical)
        <tr>
          <th scope="row">
            {{$medical->id}}
          </th>
          <th scope="row">
            {{$medical->patient}}
          </th>
          <td>
            {{$medical->room}}
          </td>
          <td>
            {{$medical->shift}}
          </td>
            <td>
                <button class="btn btn-info btn-md">{{ $medical->hour_hd }}</button>
            </td>
          <td>
            {{$medical->created_at}}
          </td>
          <td>

            <form action="{{ url('/medicals/'.$medical->id) }}" method="POST">
              @csrf

              <a href="{{ url('/medicals/'.$medical->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-body">
    {{ $medicals->appends($_GET)->links() }}
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
