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
        <h3 class="mb-0">Medicina</h3>
        <h3>Paciente: {{ $medical->patient }}</h3>
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

    @if (!$ultimaOrdenNoVacia)
        <div class="row">

            <div class="form-group col-sm-12 col-lg-2">
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


  {{--          <div class="form-group col-sm-12 col-lg-2">
                <label for="so2">Saturacion SO2</label>
                <input type="text" name="so2" class="form-control" value="{{ old('so2', $medical->so2) }}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="fio">FIO2</label>
                <input type="text" name="fio" class="form-control" value="{{ !$medical->fio ? '0.21' : $medical->fio }}">
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="temp">TEMPERATURA</label>
                <input type="text" name="temp" class="form-control" value="{{ old('temp', $medical->temp) }}">
            </div>--}}
        </div>

          <div class="row">
              @if ($medical->clinical_trouble == null)
                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="clinical_trouble">Problemas Clínicos:</label>
                      <textarea class="form-control" id="" name="clinical_trouble" rows="2">{{ old('clinical_trouble', '1) Insuficiencia renal terminal (N18.0)  2) Anemia cronica (D63.8)') }}</textarea>
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="clinical_trouble">Problemas Clínicos</label>
                      <textarea class="form-control" id="" name="clinical_trouble" rows="2">{{ $medical->clinical_trouble }}</textarea>
                  </div>
              @endif
              {{--
                        <div class="form-group col-sm-12 col-lg-3">
                          <label for="evaluation">Evaluación</label>
                          <textarea class="form-control" id="" name="evaluation" rows="2">{{ old('evaluation' ,$medical->evaluation) }}</textarea>
                        </div>--}}

                  @if($medical->signal == null)
                      <div class="form-group col-sm-12 col-lg-4">
                          <label for="signal">Signos y Sintomas</label>
                          <textarea class="form-control" id="" name="signal" rows="2">{{ old('signal', 'NIEGA') }}</textarea>
                      </div>
                  @else
                      <div class="form-group col-sm-12 col-lg-4">
                          <label for="signal">Signos y Sintomas</label>
                          <textarea class="form-control" id="" name="signal" rows="2">{{ old('signal', $medical->signal) }}</textarea>
                      </div>
                  @endif

              <div class="form-group col-sm-12 col-lg-4">
                  <label for="fua_observacion">Observaciones</label>
                  <textarea class="form-control" id="" name="fua_observacion" rows="2">{{ old('fua_observacion', $medical->fua_observacion) }}</textarea>
              </div>


                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="start_pa">PA Inicial</label>
                      <input type="text" name="start_pa" class="form-control" value="{{ old('start_pa', $medical->start_pa) }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="fc">Frecuencia Cardiaca</label>
                      <input type="text" name="fc" class="form-control" value="{{ old('fc', $medical->fc) }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="serology">Serologia</label>
                      <input type="text" name="serology" class="form-control" value="{{ old('serology', $medical->serology) }}">
                  </div>

          </div>



          {{--<div class="row">
              <div class="form-group col-sm-12 col-lg-2">
                  <label for="epo">Epoteina alfa 2000 Ul/mL:</label>
                  <input type="number" name="epo" class="form-control" value="{{ old('epo', !$medical->epo ? 0 : $medical->epo) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="epo4000">Epoteina alfa 4000 Ul/mL:</label>
                  <input type="number" name="epo4000" class="form-control" value="{{ old('epo4000', !$medical->epo4000 ? 0 : $medical->epo4000) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="iron">Hierro 20 mg Fe/mL INY 5 mL:</label>
                  <input type="number" name="iron" class="form-control" value="{{ old('iron', !$medical->iron ? 0 : $medical->iron) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="vitb12">Hidroxicobalamina 1mg/mL INY 1mL: </label>
                  <input type="number" name="vitb12" class="form-control" value="{{ old('vitb12', !$medical->vitb12 ? 0 : $medical->vitb12) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="calci">Calcitriol 1 mcg/mL INY:</label>
                  <input type="number" name="calci" class="form-control" value="{{ old('calci', !$medical->calci ? 0 : $medical->calci) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>
          </div>--}}

        <div class="row">
          <div class="form-group col-sm-12 col-lg-1">
            <label for="hour_hd">HORA HD</label>
            <input type="text" name="hour_hd" class="form-control" value="{{ old('hour_hd', $medical->hour_hd) }}">
          </div>

          <div class="form-group col-sm-12 col-lg-1">
            <label for="heparin">Heparina</label>
              @if(!$medical->heparin)
                  <input type="text" name="heparin" class="form-control border border-danger" value="{{ old('heparin', $medical->heparin) }}">
              @else
                  <input type="text" name="heparin" class="form-control" value="{{ old('heparin', $medical->heparin) }}">
              @endif
          </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="start_weight">Peso Inicial</label>
                <input type="text" name="start_weight" class="form-control" value="{{ old('start_weight', $medical->start_weight) }}">
            </div>

          <div class="form-group col-sm-12 col-lg-2">
            <label for="dry_weight">Peso Seco</label>
            <input type="text" name="dry_weight" class="form-control" value="{{ old('dry_weight', $medical->dry_weight) }}">
          </div>

          <div class="form-group col-sm-12 col-lg-1">
            <label for="uf">UF</label>
            <input type="text" name="uf" class="form-control" value="{{ old('uf', $medical->uf) }}">
          </div>

          <div class="form-group col-sm-12 col-lg-1">
            <label for="qb">QB</label>
            <input type="text" name="qb" class="form-control" value="{{ old('qb', $medical->qb) }}">
          </div>

            @if($medical->qd == null)
                <div class="form-group col-sm-12 col-lg-1">
                    <label for="qd">QD</label>
                    <input type="text" name="qd" class="form-control" value="{{ old('qd', '500') }}">
                </div>
            @else
                <div class="form-group col-sm-12 col-lg-1">
                    <label for="qd">QD</label>
                    <input type="text" name="qd" class="form-control" value="{{ old('qd', $medical->qd) }}">
                </div>
            @endif

            @if($medical->bicarbonat == null)
                <div class="form-group col-sm-12 col-lg-3">
                    <label for="bicarbonat">Buffer</label>
                    <input type="text" name="bicarbonat" class="form-control" value="{{ old('bicarbonat', 'bicarbonato') }}">
                </div>
            @else
                <div class="form-group col-sm-12 col-lg-3">
                    <label for="bicarbonat">Buffer</label>
                    <input type="text" name="bicarbonat" class="form-control" value="{{ old('bicarbonat', $medical->bicarbonat) }}">
                </div>
            @endif

        </div>

        <div class="row">

            <div class="form-group col-sm-12 col-lg-1">
                <label for="cnd">CND</label>
                <input type="text" name="cnd" class="form-control" value="{{ old('cnd', $medical->cnd) }}">
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="start_na">NA INICIAL</label>
                <input type="text" name="start_na" class="form-control" value="{{ old('start_na', $medical->start_na) }}">
            </div>

          <div class="form-group col-sm-12 col-lg-1">
            <label for="end_na">NA FINAL</label>
            <input type="text" name="end_na" class="form-control" value="{{ old('end_na', $medical->end_na) }}">
          </div>

            @if($medical->profile_na == null)
                <div class="form-group col-sm-12 col-lg-1">
                    <label for="profile_na">Perfil Na</label>
                    <input type="text" name="profile_na" class="form-control" value="{{ old('profile_na', '0') }}">
                </div>
            @else
                <div class="form-group col-sm-12 col-lg-1">
                    <label for="profile_na">Perfil Na</label>
                    <input type="text" name="profile_na" class="form-control" value="{{ old('profile_na', $medical->profile_na) }}">
                </div>
            @endif

            @if($medical->profile_uf == null)
                <div class="form-group col-sm-12 col-lg-2">
                    <label for="profile_uf">Perfil UF:</label>
                    <input type="text" name="profile_uf" class="form-control" value="{{ old('profile_uf', '0') }}">
                </div>
            @else
                <div class="form-group col-sm-12 col-lg-2">
                    <label for="profile_uf">Perfil UF:</label>
                    <input type="text" name="profile_uf" class="form-control" value="{{ old('profile_uf', $medical->profile_uf) }}">
                </div>
            @endif

          <div class="form-group col-sm-12 col-lg-3">
            <label for="area_filter">ÁREA/FILTRO</label>
            <input type="text" name="area_filter" class="form-control" value="{{ old('area_filter', $medical->area_filter) }}">
          </div>

            @if($medical->membrane == null)
                <div class="form-group col-sm-12 col-lg-3">
                    <label for="membrane">MEMBRANA</label>
                    <input type="text" name="membrane" class="form-control" value="{{ old('membrane', 'Polietersulfona') }}">
                </div>
            @else
                <div class="form-group col-sm-12 col-lg-3">
                    <label for="membrane">MEMBRANA</label>
                    <input type="text" name="membrane" class="form-control" value="{{ old('membrane', $medical->membrane) }}">
                </div>
            @endif


    <!--      <div class="form-group col-sm-12 col-lg-2">
            <label for="serological">Cond. Serologica</label>
            <select class="form-control" name="serological" data-toggle="select" title="Simple select" data-placeholder="Select a state">
              <option value="{{ $medical->serological }}" disabled="">{{ $medical->serological }}</option>
              <option value="NEGATIVO">NEGATIVO</option>
              <option value="POSITIVO">POSITIVO</option>
            </select>
          </div>-->
        </div>

        <div class="row">


<!--      <div class="form-group col-sm-12 col-lg-3">
        <label for="dializer">Dializador</label>
        @if ( $medical->dializar != null )
          <input type="text" name="dializer" class="form-control" value="{{ $medical->dializer }}">
        @else
          <input type="text" name="dializer" class="form-control" value="{{ old('dializer', 'ELISIO') }}">
        @endif

      </div>-->
        @if($medical->end_evaluation == null)
            <div class="form-group col-sm-12 col-lg-4">
                <label for="end_evaluation">Evaluación Final</label>
                <textarea class="form-control" id="" name="end_evaluation" rows="2">{{ old('end_evaluation' ,'SIN COMPLICACIONES') }}</textarea>
            </div>
        @else
            <div class="form-group col-sm-12 col-lg-4">
                <label for="end_evaluation">Evaluación Final</label>
                <textarea class="form-control" id="" name="end_evaluation" rows="2">{{ old('end_evaluation' ,$medical->end_evaluation) }}</textarea>
            </div>
        @endif

        {{--<div class="form-group col-sm-12 col-lg-4">
            <label for="fua_observacion">OBSERVACIONES</label>
            <textarea class="form-control" id="" name="fua_observacion" rows="2">{{ old('fua_observacion' ,$medical->fua_observacion) }}</textarea>
        </div>--}}

        <div class="form-group col-sm-12 col-lg-2">
            <label for="end_hour">Hora final</label>
            <input type="time" name="end_hour" class="form-control" value="{{ old('end_hour', $medical->end_hour) }}">
        </div>

        <div class="form-group col-sm-12 col-lg-3">
            <label for="medico_final">MEDICO QUE FINALIZA</label>
            <select class="form-control selectpicker" name="medico_final" data-live-search="true" data-style="btn-info">
                <option value="{{ !$medical->user_id ? auth()->user()->name : $medical->user->name }}">{{ !$medical->user_id ? auth()->user()->name : $medical->user->name }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach

            </select>
        </div>

    </div>
      @else

          <div class="row">

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="start_hour">Hora Inicial</label>
                  <input type="time" name="start_hour" class="form-control" value="{{ old('start_hour', $ultimaOrdenNoVacia->start_hour) }}">
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

              {{--<div class="form-group col-sm-12 col-lg-2">
                  <label for="so2">Saturacion SO2</label>
                  <input type="text" name="so2" class="form-control" value="{{ old('so2', $ultimaOrdenNoVacia->so2) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="fio">FIO2</label>
                  <input type="text" name="fio" class="form-control" value="{{ !$ultimaOrdenNoVacia->fio ? '0.21' : $ultimaOrdenNoVacia->fio }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="temp">TEMPERATURA</label>
                  <input type="text" name="temp" class="form-control" value="{{ old('temp', $ultimaOrdenNoVacia->temp) }}">
              </div>--}}
          </div>

          <div class="row">


                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="clinical_trouble">Problemas Clínicos</label>
                      <textarea class="form-control" id="" name="clinical_trouble" rows="2">{{ $ultimaOrdenNoVacia->clinical_trouble }}</textarea>
                  </div>

              {{--              <div class="form-group col-sm-12 col-lg-3">
                                <label for="evaluation">Evaluación</label>
                                <textarea class="form-control" id="" name="evaluation" rows="2">{{ old('evaluation' ,$ultimaOrdenNoVacia->evaluation) }}</textarea>
                            </div>--}}

                  @if($ultimaOrdenNoVacia->signal == null)
                      <div class="form-group col-sm-12 col-lg-4">
                          <label for="signal">Signos y Sintomas</label>
                          <textarea class="form-control" id="" name="signal" rows="2">{{ old('signal', 'NIEGA') }}</textarea>
                      </div>
                  @else
                      <div class="form-group col-sm-12 col-lg-4">
                          <label for="signal">Signos y Sintomas</label>
                          <textarea class="form-control" id="" name="signal" rows="2">{{ old('signal', $ultimaOrdenNoVacia->signal) }}</textarea>
                      </div>
                  @endif

              <div class="form-group col-sm-12 col-lg-4">
                  <label for="fua_observacion">Observaciones</label>
                  <textarea class="form-control" id="" name="fua_observacion" rows="2">{{ old('fua_observacion', $ultimaOrdenNoVacia->fua_observacion) }}</textarea>
              </div>


                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="start_pa">PA Inicial</label>
                      <input type="text" name="start_pa" class="form-control" value="{{ old('start_pa', $ultimaOrdenNoVacia->start_pa) }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="fc">Frecuencia Cardiaca</label>
                      <input type="text" name="fc" class="form-control" value="{{ old('fc', $ultimaOrdenNoVacia->fc) }}">
                  </div>

                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="serology">Serologia</label>
                      <input type="text" name="serology" class="form-control" value="{{ old('serology', $ultimaOrdenNoVacia->serology) }}">
                  </div>

          </div>

          {{--<div class="row">
              <div class="form-group col-sm-12 col-lg-2">
                  <label for="epo">Epoteina alfa 2000 Ul/mL:</label>
                  <input type="number" name="epo" class="form-control" value="{{ old('epo', !$ultimaOrdenNoVacia->epo ? 0 : $ultimaOrdenNoVacia->epo) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="epo4000">Epoteina alfa 4000 Ul/mL:</label>
                  <input type="number" name="epo4000" class="form-control" value="{{ old('epo4000', !$ultimaOrdenNoVacia->epo4000 ? 0 : $ultimaOrdenNoVacia->epo4000) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="iron">Hierro 20 mg Fe/mL INY 5 mL:</label>
                  <input type="number" name="iron" class="form-control" value="{{ old('iron', !$ultimaOrdenNoVacia->iron ? 0 : $ultimaOrdenNoVacia->iron) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="vitb12">Hidroxicobalamina 1mg/mL INY 1mL: </label>
                  <input type="number" name="vitb12" class="form-control" value="{{ old('vitb12', !$ultimaOrdenNoVacia->vitb12 ? 0 : $ultimaOrdenNoVacia->vitb12) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>

              <div class="form-group col-sm-12 col-lg-3">
                  <label for="calci">Calcitriol 1 mcg/mL INY:</label>
                  <input type="number" name="calci" class="form-control" value="{{ old('calci', !$ultimaOrdenNoVacia->calci ? 0 : $ultimaOrdenNoVacia->calci) }}" placeholder="COLOCAR SOLO CANTIDAD">
              </div>
          </div>--}}

          <div class="row">
              <div class="form-group col-sm-12 col-lg-1">
                  <label for="hour_hd">HORA HD</label>
                  <input type="text" name="hour_hd" class="form-control" value="{{ old('hour_hd', $ultimaOrdenNoVacia->hour_hd) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="heparin">Heparina</label>
                  @if(!$ultimaOrdenNoVacia->heparin)
                      <input type="text" name="heparin" class="form-control border border-danger" value="{{ old('heparin', $ultimaOrdenNoVacia->heparin) }}">
                  @else
                      <input type="text" name="heparin" class="form-control" value="{{ old('heparin', $ultimaOrdenNoVacia->heparin) }}">
                  @endif

              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="start_weight">Peso Inicial</label>
                  <input type="text" name="start_weight" class="form-control" value="{{ old('start_weight', $ultimaOrdenNoVacia->start_weight) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-2">
                  <label for="dry_weight">Peso Seco</label>
                  <input type="text" name="dry_weight" class="form-control" value="{{ old('dry_weight', $ultimaOrdenNoVacia->dry_weight) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="uf">UF</label>
                  <input type="text" name="uf" class="form-control" value="{{ old('uf', $ultimaOrdenNoVacia->uf) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="qb">QB</label>
                  <input type="text" name="qb" class="form-control" value="{{ old('qb', $ultimaOrdenNoVacia->qb) }}">
              </div>

              @if($ultimaOrdenNoVacia->qd == null)
                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="qd">QD</label>
                      <input type="text" name="qd" class="form-control" value="{{ old('qd', '500') }}">
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="qd">QD</label>
                      <input type="text" name="qd" class="form-control" value="{{ old('qd', $ultimaOrdenNoVacia->qd) }}">
                  </div>
              @endif

              @if($ultimaOrdenNoVacia->bicarbonat == null)
                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="bicarbonat">Bicarbonato</label>
                      <input type="text" name="bicarbonat" class="form-control" value="{{ old('bicarbonat', '5.6') }}">
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="bicarbonat">Bicarbonato</label>
                      <input type="text" name="bicarbonat" class="form-control" value="{{ old('bicarbonat', $ultimaOrdenNoVacia->bicarbonat) }}">
                  </div>
              @endif

          </div>

          <div class="row">

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="cnd">CND</label>
                  <input type="text" name="cnd" class="form-control" value="{{ old('cnd', $ultimaOrdenNoVacia->cnd) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="start_na">NA INICIAL</label>
                  <input type="text" name="start_na" class="form-control" value="{{ old('start_na', $ultimaOrdenNoVacia->start_na) }}">
              </div>

              <div class="form-group col-sm-12 col-lg-1">
                  <label for="end_na">NA FINAL</label>
                  <input type="text" name="end_na" class="form-control" value="{{ old('end_na', $ultimaOrdenNoVacia->end_na) }}">
              </div>

              @if($ultimaOrdenNoVacia->profile_na == null)
                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="profile_na">Perfil Na</label>
                      <input type="text" name="profile_na" class="form-control" value="{{ old('profile_na', 'PERFIL L') }}">
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-1">
                      <label for="profile_na">Perfil Na</label>
                      <input type="text" name="profile_na" class="form-control" value="{{ old('profile_na', $ultimaOrdenNoVacia->profile_na) }}">
                  </div>
              @endif

              @if($ultimaOrdenNoVacia->profile_uf == null)
                  <div class="form-group col-sm-12 col-lg-2">
                      <label for="profile_uf">Perfil UF:</label>
                      <input type="text" name="profile_uf" class="form-control" value="{{ old('profile_uf', 'PERFIL L') }}">
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-2">
                      <label for="profile_uf">Perfil UF:</label>
                      <input type="text" name="profile_uf" class="form-control" value="{{ old('profile_uf', $ultimaOrdenNoVacia->profile_uf) }}">
                  </div>
              @endif


              <div class="form-group col-sm-12 col-lg-3">
                  <label for="area_filter">ÁREA/FILTRO</label>
                  <input type="text" name="area_filter" class="form-control" value="{{ old('area_filter', $ultimaOrdenNoVacia->area_filter) }}">
              </div>

              @if($ultimaOrdenNoVacia->membrane == null)
                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="membrane">MEMBRANA</label>
                      <input type="text" name="membrane" class="form-control" value="{{ old('membrane', 'PSF') }}">
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-3">
                      <label for="membrane">MEMBRANA</label>
                      <input type="text" name="membrane" class="form-control" value="{{ old('membrane', $ultimaOrdenNoVacia->membrane) }}">
                  </div>
              @endif



              <!--      <div class="form-group col-sm-12 col-lg-2">
        <label for="serological">Cond. Serologica</label>
        <select class="form-control" name="serological" data-toggle="select" title="Simple select" data-placeholder="Select a state">
          <option value="{{ $ultimaOrdenNoVacia->serological }}" disabled="">{{ $ultimaOrdenNoVacia->serological }}</option>
          <option value="NEGATIVO">NEGATIVO</option>
          <option value="POSITIVO">POSITIVO</option>
        </select>
      </div>-->
          </div>

          <div class="row">


              <!--      <div class="form-group col-sm-12 col-lg-3">
        <label for="dializer">Dializador</label>
        @if ( $ultimaOrdenNoVacia->dializar != null )
                  <input type="text" name="dializer" class="form-control" value="{{ $ultimaOrdenNoVacia->dializer }}">
        @else
                  <input type="text" name="dializer" class="form-control" value="{{ old('dializer', 'ELISIO') }}">
        @endif

              </div>-->
              @if($ultimaOrdenNoVacia->end_evaluation == null)
                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="end_evaluation">Evaluación Final</label>
                      <textarea class="form-control" id="" name="end_evaluation" rows="2">{{ old('end_evaluation' ,'SIN COMPLICACIONES') }}</textarea>
                  </div>
              @else
                  <div class="form-group col-sm-12 col-lg-4">
                      <label for="end_evaluation">Evaluación Final</label>
                      <textarea class="form-control" id="" name="end_evaluation" rows="2">{{ old('end_evaluation' ,$ultimaOrdenNoVacia->end_evaluation) }}</textarea>
                  </div>
              @endif


              <div class="form-group col-sm-12 col-lg-2">
                  <label for="end_hour">Hora final</label>
                  <input type="time" name="end_hour" class="form-control" value="{{ old('end_hour', $ultimaOrdenNoVacia->end_hour) }}">
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
      @endif

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>



  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endsection
