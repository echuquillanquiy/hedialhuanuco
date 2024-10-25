@extends('layouts.panel')

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@endsection

@section('content')

<div class="card shadow">

  @if (session('notification'))
    <div class="alert alert-success" role="alert">
      <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
      {{ session('notification') }}
    </div>
  @endif

  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h1 class="mb-0">PARTE DE ATENCIÓN DE ENFERMERIA</h1>
        <h3>Paciente: {{ $nurse->order->patient->surname }} {{ $nurse->order->patient->lastname }} {{ $nurse->order->patient->firstname }} {{ $nurse->order->patient->othername }}</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('nurses') }}" class="btn btn-sm btn-default">
          Cancelar y volver
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">

    <form action="{{ url('nurses/'.$nurse->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="nav-wrapper">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
          <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#medical" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-folder-17 mr-2"></i>Parte médico</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#nurse" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-book-bookmark mr-2"></i>Enfermería</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#treatment" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-archive-2 mr-2"></i>Evolución / Tratamiento</a>
          </li>
        </ul>
      </div>

      <div class="card shadow">
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="medical" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                @include('nurses.componentes.medicina')
              </div>

              <div class="tab-pane fade" id="nurse" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                  @include('nurses.componentes.enfermeria')
              </div>

              <div class="tab-pane fade" id="treatment" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                  @include('nurses.componentes.tratamientos')
              </div>

            <button type="submit" class="btn btn-primary" >Guardar</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')

    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
        function syncFields() {
            var position = document.getElementById('position').value;
            document.getElementById('machine').value = position;
        }
    </script>
@endsection
