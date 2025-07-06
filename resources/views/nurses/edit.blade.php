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

    <script>
        // Función para calcular las horas en tiempo real
        function calcularHoras() {
            const hr1 = document.getElementById('hr1').value; // Hora inicial

            if (!hr1) {
                return; // Si no hay hora inicial, no hacer nada
            }

            const [hours, minutes] = hr1.split(':').map(Number);

            // Cálculos para las horas adicionales (hr2, hr3, hr4, hr5)
            const hr2 = new Date();
            hr2.setHours(hours + 1, minutes);

            const hr3 = new Date();
            hr3.setHours(hours + 2, minutes);

            const hr4 = new Date();
            hr4.setHours(hours + 3, minutes);

            // Para hr5 se debe sumar el valor de hourHd correctamente
            const hr5 = new Date();
            hr5.setHours(hours, minutes); // Empezamos con la hora inicial

            // Asignamos un valor por defecto de 3.5 si no se tiene hourHd
            const hourHd = {{ $nurse->order->medical->hour_hd ?? 3.5 }}; // Usamos 3.5 por defecto si no existe hour_hd

            // Verifica si el valor es de tipo número (si es cadena, convertimos)
            const hourHdValue = parseFloat(hourHd);

            switch (hourHdValue) {
                case 3: // Si hour_hd es 3, hr5 se deja vacío
                    document.getElementById('hr5').value = '';
                    break;
                case 3.25: // Si hour_hd es 3.25, se agrega 195 minutos (3 horas y 15 minutos)
                    hr5.setMinutes(hr5.getMinutes() + 195); // 3 horas y 15 minutos
                    document.getElementById('hr5').value = formatTime(hr5);
                    break;
                case 3.5: // Si hour_hd es 3.5, se agrega 210 minutos (3 horas y 30 minutos)
                    hr5.setMinutes(hr5.getMinutes() + 210); // 3 horas y 30 minutos
                    document.getElementById('hr5').value = formatTime(hr5);
                    break;
                case 3.75: // Si hour_hd es 3.75, se agrega 225 minutos (3 horas y 45 minutos)
                    hr5.setMinutes(hr5.getMinutes() + 225); // 3 horas y 45 minutos
                    document.getElementById('hr5').value = formatTime(hr5);
                    break;
                default: // Por defecto, se agregan 4 horas (240 minutos)
                    hr5.setMinutes(hr5.getMinutes() + 240); // 4 horas
                    document.getElementById('hr5').value = formatTime(hr5);
                    break;
            }

            // Asignar los valores calculados a los campos
            document.getElementById('hr2').value = formatTime(hr2);
            document.getElementById('hr3').value = formatTime(hr3);
            document.getElementById('hr4').value = formatTime(hr4);
        }

        // Función para formatear la hora a 'HH:mm'
        function formatTime(date) {
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }
    </script>




@endsection
