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

        <div class="col-lg-6">
          <div class="form-group">
            <label for="patient">Nombres y Apellidos</label>
            <input type="text" name="patient" class="form-control" value="{{ old('patient') }}" autofocus>
          </div>
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
            <label for="date_order">Fecha</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" placeholder="Seleccionar fecha"
                id="date_order" name="date_order" type="text"
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
      <thead class="thead-light text-center">
        <tr>
          <th scope="col">Nombres y Apellidos</th>
	        <th scope="col">Opciones</th>
	     <th scope="col">HD Inicio</th>
	     <th scope="col">HD Fin</th>
          <th scope="col">Turno</th>
            <th scope="col">Maquina / Puesto</th>
            <th scope="col">Epo2000</th>
            <th scope="col">Epo4000</th>
            <th scope="col">Vit b12</th>
            <th scope="col">Hierro</th>
            <th>Fecha</th>
            <th>Enf. Inicia</th>
            <th>Enf. Finaliza</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($nurses as $nurse)
        <tr>

	        <th scope="row">
                {{ $nurse->order->patient->surname }} {{ $nurse->order->patient->lastname }} {{ $nurse->order->patient->firstname }} {{ $nurse->order->patient->othername }}
            </th>

        <td class="text-center">

            <form action="{{ url('/nurses/'.$nurse->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <a href="{{ url('/nurses/'.$nurse->id.'/edit') }}" class="btn btn-sm btn-success" target="_blank">
                  <i class="fas fa-edit"></i>
              </a>

                @if ($nurse->order->created_at->format('Y-m-d') <= date('2020-03-10'))
                    <a href="{{ url('/orders/'.$nurse->order->id.'/impresion') }}" class="btn btn-sm btn-info" target="_blank">Impresión</a>
                @else
                    <a href="{{ url('/orders/'.$nurse->order->id.'/impresion2020') }}" class="btn btn-sm btn-danger" target="_blank">Historia</a>
                @endif
            </form>
          </td>

          <th scope="row" class="text-center">
            {{$nurse->hr}}
          </th>


          <th scope="row">
              @if($nurse->hr8 == '-' || $nurse->hr8 == null)
                  {{$nurse->hr7}}
              @else
                  {{$nurse->hr8}}
              @endif
          </th>
          <td class="text-center">
              @if($nurse->shift == 'I')
                  1

              @elseif($nurse->shift == 'II')
                  2

              @elseif($nurse->shift == 'III')
                  3
              @else
                  4
              @endif
          </td>

            <td class="text-center">
                {{ $nurse->position }} / {{ $nurse->machine }}
            </td>

            <td class="text-center">{{ $nurse->epo2000 }}</td>
            <td class="text-center">{{ $nurse->epo4000 }}</td>
            <td class="text-center">{{ $nurse->hidroxi }}</td>
            <td class="text-center">{{ $nurse->iron }}</td>

          <td class="text-center">
	        {{ $nurse->date_order}}
          </td>
            @if($nurse->user_id)
                <td class="text-center">
                    {{ $nurse->user->name}}
                </td>
            @else
                <td class="text-center">sin Seleccionar</td>
            @endif

            @if($nurse->user_id2)
                <td class="text-center">
                    {{ $nurse->user2->name}}
                </td>
            @else
                <td class="text-center">Sin seleccionar</td>
            @endif
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
