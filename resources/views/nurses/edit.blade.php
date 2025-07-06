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
            const hr1Input = document.getElementById('hr1'); // Input del campo hr1
            const hr1Value = hr1Input.value; // Valor de la hora inicial (hr1)

            if (!hr1Value) {
                // Si no hay hora inicial, limpiar todos los campos y salir
                document.getElementById('hr2').value = '';
                document.getElementById('hr3').value = '';
                document.getElementById('hr4').value = '';
                document.getElementById('hr5').value = '';
                return;
            }

            const [hours, minutes] = hr1Value.split(':').map(Number);

            // Crear una fecha base a partir de hr1 para cálculos consistentes
            const baseDate = new Date();
            baseDate.setHours(hours, minutes, 0, 0); // Establecer la hora inicial, limpiar segundos y milisegundos

            // Variables para las fechas calculadas
            let hr2CalculatedDate = new Date();
            let hr3CalculatedDate = new Date();
            let hr4CalculatedDate = new Date();
            let hr5CalculatedDate = new Date();

            // Asignamos un valor por defecto de 3.5 si no se tiene hourHd
            // Si $nurse->order->medical->hour_hd es null o vacío, usará 3.5
            const hourHd = {{ $nurse->order->medical->hour_hd ?? 3.5 }};

            // Verifica si el valor es de tipo número (si es cadena, convertimos)
            const hourHdValue = parseFloat(hourHd);

            // Lógica condicional para todas las horas (hr2, hr3, hr4, hr5)
            switch (hourHdValue) {
                case 1: // Si hour_hd es 1 (1 hora = 60 minutos, dividido en 4x15min)
                case 1.0:
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setMinutes(baseDate.getMinutes() + 15);

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setMinutes(hr2CalculatedDate.getMinutes() + 15);

                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setMinutes(hr3CalculatedDate.getMinutes() + 15);

                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setMinutes(hr4CalculatedDate.getMinutes() + 15);
                    break;

                case 2: // Si hour_hd es 2 (2 horas = 120 minutos, dividido en 4x30min)
                case 2.0:
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setMinutes(baseDate.getMinutes() + 30);

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setMinutes(hr2CalculatedDate.getMinutes() + 30);

                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setMinutes(hr3CalculatedDate.getMinutes() + 30);

                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setMinutes(hr4CalculatedDate.getMinutes() + 30);
                    break;

                case 2.5: // Si hour_hd es 2.5 (2.5 horas = 150 minutos: 1h, 30min, 30min, 30min)
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1); // +1 hora

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setMinutes(hr2CalculatedDate.getMinutes() + 30); // +30 min

                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setMinutes(hr3CalculatedDate.getMinutes() + 30); // +30 min

                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setMinutes(hr4CalculatedDate.getMinutes() + 30); // +30 min
                    break;

                case 3: // Si hour_hd es 3 (HR4 = HR3 + 30min, HR5 = HR4 + 30min)
                    // Primero calculamos hr2 y hr3 de forma estándar (hr1 +1h, hr2+1h)
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // Ahora aplicamos la lógica específica para hr4 y hr5
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setMinutes(hr3CalculatedDate.getMinutes() + 30); // HR4 = HR3 + 30 min

                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setMinutes(hr4CalculatedDate.getMinutes() + 30); // HR5 = HR4 + 30 min
                    break;

                case 3.25: // Si hour_hd es 3.25 (lógica original para hr5, hr4 es +1hr)
                    // Primero calculamos hr2 y hr3 de forma estándar
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // HR4 es HR3 + 1 hora (lógica default)
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setHours(hr3CalculatedDate.getHours() + 1);

                    // HR5 es hr1 + 195 minutos (3 horas y 15 minutos)
                    hr5CalculatedDate = new Date(baseDate);
                    hr5CalculatedDate.setMinutes(baseDate.getMinutes() + 195);
                    break;

                case 3.5: // Si hour_hd es 3.5 (Lógica: HR2, HR3, HR4 son +1h, y HR5 es hr1 + 3h 30min)
                    // hr2 (hr1 + 1 hora)
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    // hr3 (hr2 + 1 hora)
                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // HR4 (HR3 + 1 HORA)
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setHours(hr3CalculatedDate.getHours() + 1);

                    // HR5 es hr1 + 210 minutos (3 horas y 30 minutos) - Lógica original para 3.5
                    hr5CalculatedDate = new Date(baseDate);
                    hr5CalculatedDate.setMinutes(baseDate.getMinutes() + 210);
                    break;

                case 3.75: // Si hour_hd es 3.75 (lógica original para hr5, hr4 es +1hr)
                    // Primero calculamos hr2 y hr3 de forma estándar
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // HR4 es HR3 + 1 hora (lógica default)
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setHours(hr3CalculatedDate.getHours() + 1);

                    // HR5 es hr1 + 225 minutos (3 horas y 45 minutos)
                    hr5CalculatedDate = new Date(baseDate);
                    hr5CalculatedDate.setMinutes(baseDate.getMinutes() + 225);
                    break;

                case 4: // Si hour_hd es 4 (4 horas = 240 minutos)
                case 4.0:
                    // hr2 (hr1 + 1 hora)
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    // hr3 (hr2 + 1 hora)
                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // HR4 (HR3 + 1 HORA)
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setHours(hr3CalculatedDate.getHours() + 1);

                    // HR5 (HR4 + 1 HORA)
                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setHours(hr4CalculatedDate.getHours() + 1);
                    break;

                default: // Por defecto, para cualquier otro valor de hour_hd no especificado
                    // hr2 (hr1 + 1 hora)
                    hr2CalculatedDate = new Date(baseDate);
                    hr2CalculatedDate.setHours(baseDate.getHours() + 1);

                    // hr3 (hr2 + 1 hora)
                    hr3CalculatedDate = new Date(hr2CalculatedDate);
                    hr3CalculatedDate.setHours(hr2CalculatedDate.getHours() + 1);

                    // HR4 (HR3 + 1 HORA)
                    hr4CalculatedDate = new Date(hr3CalculatedDate);
                    hr4CalculatedDate.setHours(hr3CalculatedDate.getHours() + 1);

                    // HR5 (HR4 + 30 MINUTOS)
                    hr5CalculatedDate = new Date(hr4CalculatedDate);
                    hr5CalculatedDate.setMinutes(hr4CalculatedDate.getMinutes() + 30);
                    break;
            }

            // Asignar los valores calculados a los campos correspondientes
            document.getElementById('hr2').value = formatTime(hr2CalculatedDate);
            document.getElementById('hr3').value = formatTime(hr3CalculatedDate);
            document.getElementById('hr4').value = formatTime(hr4CalculatedDate);
            document.getElementById('hr5').value = formatTime(hr5CalculatedDate);
        }

        // Función para formatear la hora a 'HH:mm'
        function formatTime(date) {
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        // Añadir un event listener al input de hr1 para disparar el cálculo al cambiar
        document.addEventListener('DOMContentLoaded', () => {
            const hr1Input = document.getElementById('hr1');
            if (hr1Input) {
                hr1Input.addEventListener('input', calcularHoras);
                // Ejecutar el cálculo una vez al cargar la página si ya hay un valor en hr1
                calcularHoras();
            }
        });
    </script>



@endsection
