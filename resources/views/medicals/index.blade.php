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

        <div class="form-group col-lg-2">
            <label for="date_order">Fecha</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" placeholder="Seleccionar fecha"
                id="date_order" name="date_order" type="text"
                value="{{ old('date') }}"
                data-date-format="yyyy-mm-dd"
                >
          </div>
        </div>

          <div class="form-group col-sm-12 col-lg-1">
              <label for="hour_hd">HORAS</label>
              <select name="hour_hd" id="hour_hd" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
                  <option value=""></option>
                  <option value="3.0">3.0</option>
                  <option value="3.25">3.25</option>
                  <option value="3.5">3.5</option>
                  <option value="3.75">3.75</option>
              </select>
          </div>


      </div>
      <button class="btn btn-info btn-sm" type="submit">Buscar</button>
    </form>
  </div>

  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light text-center">
        <tr>
          <th scope="col">Nombres y Apellidos</th>
          <th scope="col">Sala</th>
          <th scope="col">Turno</th>
          <th scope="col">HD</th>
          <th scope="col">Fecha</th>
          <th scope="col">Editar</th>
          <th scope="col">P.Sec</th>
          <th scope="col">P.Ini</th>
            <th scope="col">P.Fin</th>
            <th scope="col">UF</th>
          

        </tr>
      </thead>
      <tbody>
        @foreach ($medicals as $medical)
        <tr>
          <td scope="row">
              {{ $medical->order->patient->surname }} {{ $medical->order->patient->lastname }} {{ $medical->order->patient->firstname }} {{ $medical->order->patient->othername }}
          </td>

          <td class="text-center">

             @if($medical->room == 'AMARILLA')
                  <span class="badge badge-lg bg-yellow">A</span>

              @elseif($medical->room == 'VERDE')
                      <span class="badge badge-lg badge-success">V</span>

              @elseif($medical->room == 'AZUL')
                          <span class="badge badge-lg bg-blue text-white">A</span>

              @else($medical->room == 'NARANJA')
                  <span class="badge badge-lg bg-orange text-white">N</span>
              @endif


          </td>
          <td class="text-center">

              @if($medical->shift == 'I')
                  1

              @elseif($medical->shift == 'II')
                  2

              @elseif($medical->shift == 'III')
                  3
              @else
                  4
              @endif
          </td>


            <td class="text-center">
                <button class="btn btn-info btn-sm">{{ $medical->hour_hd }}</button>
            </td>
          <td class="text-center">
            {{$medical->date_order}}
          </td>
          <td class="text-center">

            <form action="{{ url('/medicals/'.$medical->id) }}" method="POST">
              @csrf

              <a href="{{ url('/medicals/'.$medical->id.'/edit') }}" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-edit"></i></a>
            </form>
          </td>

          <td class="text-center">
                {{$medical->dry_weight}}
            </td>

            <td class="text-center">
                {{$medical->order->nurse->start_weight}}
            </td>
            <td class="text-center">
                {{$medical->order->nurse->end_weight}}
            </td>
            <td class="text-center">
                {{ preg_match('/(-?\d+)/', $medical->uf, $matches) ? $valor_num = intval($matches[0]) / 1000 : 0 }}
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
