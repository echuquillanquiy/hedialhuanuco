@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">DATOS FISSAL</h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('medical.fissalweb') }}" method="GET">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="patient">Nombres y Apellidos</label>
                            <input type="text" name="patient" class="form-control" value="{{ old('patient') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="patient">Pacientes</label>          
                        <select name="patient" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
                            <option value="">[SELECCIONE UN PACIENTE]</option>
                            @foreach ($patients as $patient)
                            <option 
                                value="{{ $patient->surname }} {{ $patient->lastname }} {{ $patient->firstname }} {{ $patient->othername }}" 
                                {{ $patient->surname }} {{ $patient->lastname }} {{ $patient->firstname }} {{ $patient->othername }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-lg-2">
                        <label for="created_at">FECHA CREACION</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" placeholder="Seleccionar fecha"
                                   id="created_at" name="created_at" type="text"
                                   value=""
                                   data-date-format="yyyy-mm-dd"
                            >
                        </div>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="date_order">FECHA ORDEN</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" placeholder="Seleccionar fecha"
                                   id="date_order" name="date_order" type="text"
                                   value=""
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
                        <th scope="col">Nombres y Apellidos DNI</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">IMPRIMIR</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                @foreach ($medicals as $medical)
                    <tr>
                        <td scope="row">
                            {{$medical->patient}}
                        </td>

                        </td>

                        <td>
                            {{$medical->order->date_order }}
                        </td>

                        <td>
                            <a href="{{ url('/orders/'.$medical->order->id.'/impresion2020') }}" class="btn btn-sm btn-danger" target="_blank">Historia</a>
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
