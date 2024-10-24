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
        <h1 class="mb-0">PARTE DE ATENCIÓN MEDICA</h1>
        <h3>Paciente: {{ $medical->order->patient->surname }} {{ $medical->order->patient->lastname }} {{ $medical->order->patient->firstname }} {{ $medical->order->patient->othername }}</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('medicals') }}" class="btn btn-sm btn-default">
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

  <form action="{{ url('medicals/'.$medical->id) }}" method="POST">
    @csrf
    @method('PUT')


          <div class="row">

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="start_hour">Hora Inicial</label>
                  <input type="time" name="start_hour" class="form-control" value="{{ old('start_hour', $medical->start_hour) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="user_id">MEDICO QUE INICIA</label>
                  <select class="form-control selectpicker" name="user_id" data-live-search="true" data-style="btn-info">
                      <option value="{{ !$medical->user_id ? auth()->user()->id : $medical->user->id }}">{{ !$medical->user_id ? auth()->user()->name : $medical->user->name }}</option>
                      @foreach($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach

                  </select>
              </div>

          </div>

          <div class="row">


                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="clinical_trouble">Problemas Clínicos</label>
                      <textarea class="form-control" id="" name="clinical_trouble" rows="2">{{ !$medical->clinical_trouble ? optional($ultimaOrdenNoVacia)->clinical_trouble : $medical->clinical_trouble }}</textarea>
                  </div>

                      <div class="form-group col-sm-12 col-lg-4">
                          <label for="signal">Signos y Sintomas</label>
                          <textarea class="form-control" id="" name="signal" rows="2">{{ !$medical->signal ? optional($ultimaOrdenNoVacia)->signal : $medical->signal }}</textarea>
                      </div>

              <div class="form-group col-sm-12 col-lg-4">
                  <label for="fua_observacion">Observaciones</label>
                  <textarea class="form-control" id="" name="fua_observacion" rows="2">{{ !$medical->fua_observacion ? optional($ultimaOrdenNoVacia)->fua_observacion : $medical->fua_observacion }}</textarea>
              </div>


                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="start_pa">PA Inicial</label>
                      <input type="text" name="start_pa" class="form-control" value="{{ !$medical->order->nurse->start_pa ? $medical->start_pa : $medical->order->nurse->start_pa }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="fc">Frecuencia Cardiaca</label>
                      <input type="text" name="fc" class="form-control" value="{{ !$medical->order->nurse->fc ? $medical->fc : "" }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="serology">Serologia</label>
                      <input type="text" name="serology" class="form-control" value="{{ !$medical->serology ? optional($ultimaOrdenNoVacia)->serology : $medical->serology }}">
                  </div>

          </div>

          <div class="row">
              <div class="form-group col-sm-12 col-lg-1">
                  <label for="hour_hd">HORA HD</label>
                  <input type="text" name="hour_hd" class="form-control" value="{{ !$medical->hour_hd ? optional($ultimaOrdenNoVacia)->hour_hd : $medical->hour_hd }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="heparin">Heparina</label>
                      <input type="text" name="heparin" class="form-control border border-danger" value="{{ !$medical->heparin ? optional($ultimaOrdenNoVacia)->heparin : $medical->heparin }}">

              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="start_weight">Peso Inicial</label>
                  <input type="text" name="start_weight" class="form-control" value="{{ old('start_weight', $medical->order->nurse->start_weight) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="dry_weight">Peso Seco</label>
                  <input type="text" name="dry_weight" class="form-control" value="{{ !$medical->dry_weight ? optional($ultimaOrdenNoVacia)->dry_weight : $medical->dry_weight }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="uf">UF</label>
                  <input type="text" name="uf" class="form-control" value="{{ !$medical->order->nurse->uf ? $medical->uf : "" }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="qb">QB</label>
                  <input type="text" name="qb" class="form-control" value="{{ !$medical->qb ? optional($ultimaOrdenNoVacia)->qb : $medical->qb }}">
              </div>

                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="qd">QD</label>
                      <input type="text" name="qd" class="form-control" value="{{ !$medical->qd ? optional($ultimaOrdenNoVacia)->qd : $medical->qd }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="bicarbonat">Buffer</label>
                      <input type="text" name="bicarbonat" class="form-control" value="{{ old("Bicarbonato", !$medical->bicarbonat ? optional($ultimaOrdenNoVacia)->bicarbonat : $medical->bicarbonat) }}">
                  </div>

          </div>

          <div class="row">

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="cnd">CND</label>
                  <input type="text" name="cnd" class="form-control" value="{{ !$medical->cnd ? optional($ultimaOrdenNoVacia)->cnd : $medical->cnd }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="start_na">NA INICIAL</label>
                  <input type="text" name="start_na" class="form-control" value="{{ !$medical->start_na ? optional($ultimaOrdenNoVacia)->start_na : $medical->start_na }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="end_na">NA FINAL</label>
                  <input type="text" name="end_na" class="form-control" value="{{ !$medical->end_na ? optional($ultimaOrdenNoVacia)->end_na : $medical->end_na }}">
              </div>

                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="profile_na">Perfil Na</label>
                      <input type="text" name="profile_na" class="form-control" value="{{ !$medical->profile_na ? optional($ultimaOrdenNoVacia)->profile_na : $medical->profile_na }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-2">
                      <label for="profile_uf">Perfil UF:</label>
                      <input type="text" name="profile_uf" class="form-control" value="{{ $medical->profile_uf }}">
                  </div>


              <div class="form-group col-sm-12 col-lg-3">
                  <label for="area_filter">ÁREA/FILTRO</label>
                  <input type="text" name="area_filter" class="form-control" value="{{ !$medical->area_filter ? optional($ultimaOrdenNoVacia)->area_filter : $medical->area_filter }}">
              </div>

                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="membrane">MEMBRANA</label>
                      <input type="text" name="membrane" class="form-control" value="{{ !$medical->membrane ? optional($ultimaOrdenNoVacia)->membrane : $medical->membrane }}">
                  </div>


          </div>

          <div class="row">

            <div class="form-group col-sm-12 col-lg-4">
                      <label for="end_evaluation">Evaluación Final</label>
                      <textarea class="form-control" id="" name="end_evaluation" rows="2">{{ !$medical->end_evaluation ? optional($ultimaOrdenNoVacia)->end_evaluation : $medical->end_evaluation  }}</textarea>
                  </div>


              <div class="form-group col-sm-12 col-lg-2">
                  <label for="end_hour">Hora final</label>
                  <input type="time" name="end_hour" class="form-control" value="{{ !$medical->order->nurse->end_hour ? $medical->end_hour : "" }}">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="medico_final">MEDICO QUE FINALIZA</label>
                  <select class="form-control selectpicker" name="medico_final" data-live-search="true" data-style="btn-info">
                      <option value="{{ $medical->medico_final }}">{{ $medical->medico_final }}</option>
                      @foreach($users as $user)
                          <option value="{{ $user->name }}">{{ $user->name }}</option>
                      @endforeach

                  </select>
              </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
  </form>

  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endsection
