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
        <h3 class="mb-0">Parte de enfermeria</h3>
        <h3>Paciente: {{ $nurse->patient }}</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('nurses') }}" class="btn btn-sm btn-default">
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

                <div class="row">

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="start_hour">Hora Inicial</label>
                        <input type="time" name="start_hour" class="form-control" readonly value="{{ $nurse->order->medical->start_hour }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-3">
                        <label for="start_weight">Peso Inicial</label>
                        <input type="text" name="start_weight" class="form-control" readonly value="{{ $nurse->order->medical->start_weight }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-3">
                        <label for="start_pa">PA Inicial</label>
                        <input type="text" name="start_pa" class="form-control" readonly value="{{ $nurse->order->medical->start_pa }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="fc">Frecuencia Cardiaca</label>
                        <input type="text" name="fc" class="form-control" readonly value="{{ $nurse->order->medical->fc }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="epo2000">EPO 2000</label>
                        <input type="number" name="" class="form-control" value="{{ $nurse->order->medical->epo }}" disabled>
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="epo4000">EPO 4000</label>
                        <input type="number" name="" class="form-control" value="{{ $nurse->order->medical->epo4000 }}" disabled>
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="epo4000">Hierro</label>
                        <input type="number" name="" class="form-control" value="{{ $nurse->order->medical->iron }}" disabled>
                    </div>

                    <div class="form-group col-sm-12 col-lg-3">
                        <label for="hidroxi">Hidroxicobalamina</label>
                        <input type="number" name="" class="form-control" value="{{ $nurse->order->medical->vitb12 }}" disabled>
                    </div>

                    <div class="form-group col-sm-12 col-lg-3">
                        <label for="calcitriol">Calcitriol</label>
                        <input type="number" name="" class="form-control" value="{{ $nurse->order->medical->calci }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="clinical_trouble">Problemas Clínicos:</label>
                        <textarea class="form-control" id="" name="clinical_trouble" rows="2" disabled>{{ $nurse->order->medical->clinical_trouble }}</textarea>
                    </div>

                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="evaluation">Evaluación</label>
                        <textarea class="form-control" id="" name="evaluation" rows="2" disabled>{{ $nurse->order->medical->evaluation }}</textarea>
                    </div>

                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="indications">Indicaciones</label>
                        <textarea class="form-control" id="" name="indications" rows="2" disabled>{{ $nurse->order->medical->indications }}</textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-lg-1">
                        <label for="hour_hd">HORA HD</label>
                        <input type="text" name="hour_hd" class="form-control" readonly value="{{ $nurse->order->medical->hour_hd }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-1">
                        <label for="heparin">Heparina</label>
                        <input type="text" name="heparin" class="form-control" readonly value="{{ $nurse->order->medical->heparin }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="dry_weight">Peso Seco</label>
                        <input type="text" name="dry_weight" class="form-control" readonly value="{{ $nurse->order->medical->dry_weight }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" class="form-control" readonly value="{{ $nurse->order->medical->uf }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="qb">QB</label>
                        <input type="text" name="qb" class="form-control" readonly value="{{ $nurse->order->medical->qb }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="qd">QD</label>
                        <input type="text" name="qd" class="form-control" readonly value="{{ $nurse->order->medical->qd }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="bicarbonat">Bicarbonato</label>
                        <input type="text" name="bicarbonat" class="form-control" readonly value="{{ $nurse->order->medical->bicarbonat }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="start_na">NA INICIAL</label>
                        <input type="text" name="start_na" class="form-control" readonly value="{{ $nurse->order->medical->start_na }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-1">
                        <label for="cnd">CND</label>
                        <input type="text" name="cnd" class="form-control" readonly value="{{ $nurse->order->medical->cnd }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="end_na">NA FINAL</label>
                        <input type="text" name="end_na" class="form-control" readonly value="{{ $nurse->order->medical->end_na }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-1">
                        <label for="profile_na">Perfil Na</label>
                        <input type="text" name="profile_na" class="form-control" readonly value="{{ $nurse->order->medical->profile_na }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="area_filter">ÁREA/FILTRO</label>
                        <input type="text" name="area_filter" class="form-control" readonly value="{{ $nurse->order->medical->area_filter }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="membrane">MEMBRANA</label>
                        <input type="text" name="membrane" class="form-control" readonly value="{{ $nurse->order->medical->membrane }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="profile_uf">Perfil UF:</label>
                        <input type="text" name="profile_uf" class="form-control" readonly value="{{ $nurse->order->medical->profile_uf }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="bicarbonat">Bicarbonato</label>
                        <input type="text" name="bicarbonat" class="form-control" readonly value="{{ $nurse->order->medical->bicarbonat }}">
                    </div>

                    <div class="form-group col-sm-12 col-lg-4">
                        <label for="end_evaluation">Evaluación Final</label>
                        <textarea class="form-control" readonly id="" name="end_evaluation" rows="2">{{ $nurse->order->medical->evaluation }}</textarea>
                    </div>

                    <div class="form-group col-sm-12 col-lg-2">
                        <label for="end_hour">Hora final</label>
                        <input type="time" name="end_hour" class="form-control" readonly value="{{ $nurse->order->medical->end_hour }}">
                    </div>

                </div>

            </div>

              @if(!$ultimaOrdenNoVacia)
                  <div class="tab-pane fade active" id="nurse" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="hcl">H.CL</label>
                              <input type="text" name="hcl" class="form-control" value="{{ old('hcl', $nurse->order->patient->dni) }}" readonly>
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="frequency">Frecuencia HD</label>
                              <input type="text" name="frequency" class="form-control" value="{{ old('frequency', '3 VECES POR SEMANA', $nurse->frequency) }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="nhd">N° HD</label>
                              <input type="text" name="nhd" class="form-control" value="1">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="others">Otros</label>
                              <select class="form-control" name="others" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{$nurse->others}}">{{$nurse->others}}</option>
                                  <option value="L - M - V">L - M - V</option>
                                  <option value="M - J - S">M - J - S</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="position">Puesto</label>
                              <input type="text" name="position" class="form-control" value="{{ old('position', $nurse->position) }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="aspect_dializer">Aspecto del dializador</label>
                              <input type="text" name="aspect_dializer" class="form-control" value="{{ old('aspect_dializer', $nurse->aspect_dializer) }}">
                          </div>
                      </div>

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="start_pa">P.A. Inicial</label>
                              <input type="text" name="start_pa" class="form-control"
                                     @if ($nurse->start_pa == null)
                                         value="{{ old('start_pa', $nurse->order->medical->start_pa) }}"
                                     @else
                                         value="{{ old('start_pa', $nurse->start_pa) }}"
                                  @endif
                              >
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="end_pa">P.A. Final</label>
                              <input type="text" name="end_pa" class="form-control" value="{{ old('end_pa', $nurse->end_pa) }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="start_weight">Peso Inicial</label>
                              <input type="text" name="start_weight" class="form-control" value="{{ old('start_weight', $nurse->order->medical->start_weight) }}">
                          </div>

                          @if($nurse->end_weight)
                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="end_weight">Peso Final</label>
                                  <input type="text" name="end_weight" class="form-control" value="{{ old('end_weight', $nurse->end_weight) }}">
                              </div>
                          @else
                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="end_weight">Peso Final</label>
                                  <input type="text" name="end_weight" class="form-control" value="{{ old('end_weight', $nurse->order->medical->dry_weight) }}">
                              </div>
                          @endif

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="machine">N° de Maquina</label>
                              <input type="text" name="machine" class="form-control" value="{{ old('machine', $nurse->machine) }}">
                          </div>

                          @if(!$nurse->brand_model)

                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="brand_model">Marca/Modelo</label>
                                  <input type="text" name="brand_model" class="form-control" value="{{ old('brand_model', 'FRESENIUS', $nurse->brand_model) }}">
                              </div>
                          @else
                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="brand_model">Marca/Modelo</label>
                                  <input type="text" name="brand_model" class="form-control" value="{{ $nurse->brand_model }}">
                              </div>
                          @endif

                      </div>

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="filter">Filtro</label>
                              <input type="text" name="filter" class="form-control" value="{{ old('filter', $nurse->filter) }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="uf">UF</label>
                              <input type="text" name="uf" class="form-control" value="{{ old('uf', $nurse->order->medical->uf) }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="access_arterial">ARTERIAL</label>
                              <select class="form-control" name="access_arterial" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{ $nurse->access_arterial }}">{{ old('access_arterial',$nurse->access_arterial) }}</option>
                                  <option value="FAV">FAV</option>
                                  <option value="INJ">INJ</option>
                                  <option value="CVCL">CVCL</option>
                                  <option value="CVCLP">CVCLP</option>
                                  <option value="CVCT">CVCT</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="access_venoso">VENOSO</label>
                              <select class="form-control" name="access_venoso" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{ $nurse->access_venoso }}">{{ old('access_venoso', $nurse->access_venoso) }}</option>
                                  <option value="FAV">FAV</option>
                                  <option value="VP">VP</option>
                                  <option value="INJ">INJ</option>
                                  <option value="CVCL">CVCL</option>
                                  <option value="CVCLP">CVCLP</option>
                                  <option value="CVCT">CVCT</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-4">
                              <label for="iron">Hierro</label>
                              <input type="text" name="iron" class="form-control" value="{{ old('iron', !$nurse->iron ? $nurse->order->medical->iron : $nurse->iron) }}">
                          </div>

                      </div>

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="epo2000">EPO 2000</label>
                              <input type="number" name="epo2000" class="form-control" value="{{ old('epo2000', !$nurse->epo2000 ? $nurse->order->medical->epo : $nurse->epo2000) }}" placeholder="COLOCAR SOLO CANTIDAD">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="epo4000">EPO 4000</label>
                              <input type="number" name="epo4000" class="form-control" value="{{ old('epo4000', !$nurse->epo4000 ? $nurse->order->medical->epo4000 : $nurse->epo4000) }}" placeholder="COLOCAR SOLO CANTIDAD">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="hidroxi">Hidroxicobalamina</label>
                              <input type="number" name="hidroxi" class="form-control" value="{{ old('hidroxi', !$nurse->hidroxi ? $nurse->order->medical->vitb12 : $nurse->hidroxi) }}" placeholder="COLOCAR SOLO CANTIDAD">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="calcitriol">Calcitriol</label>
                              <input type="number" name="calcitriol" class="form-control" value="{{ old('calcitriol', !$nurse->calcitriol ? $nurse->order->medical->calci : $nurse->calcitriol) }}" placeholder="COLOCAR SOLO CANTIDAD">
                          </div>

                          <div class="form-group col-sm-12 col-lg-4">
                              <label for="others_med">Otros Medicamentos</label>
                              <input type="text" name="others_med" class="form-control" value="{{ old('others_med', $nurse->others_med) }}">
                          </div>
                      </div>

                      <div class="row text-center">

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="s">S.- </label>
                              <textarea class="form-control" id="" name="s" rows="2" value="">{{ old('s', $nurse->s) }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="o">O.- </label>
                              <textarea class="form-control" id="" name="o" rows="2" value="">{{ old('o', $nurse->o) }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="a">A.- </label>
                              <textarea class="form-control" id="" name="a" rows="2" value="">{{ old('a', $nurse->a) }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="p">P.- </label>
                              <textarea class="form-control" id="" name="p" rows="2" value="">{{ old('p', $nurse->p) }}</textarea>
                          </div>

                      </div>

                      <div class="row text-center">

                          <div class="form-group col-sm-12 col-lg-9">
                              <label for="end_observation">Observación Final</label>
                              <textarea class="form-control" id="" name="end_observation" rows="3" value="">{{ old('end_observation', $nurse->end_observation) }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="user_id">USUARIO DE LA ATENCION</label>
                              <select class="form-control selectpicker" name="user_id" data-live-search="true" data-style="btn-info">
                                  <option value="{{ !$nurse->user_id ? auth()->user()->id : $nurse->user_id }}">{{ !$nurse->user_id ? auth()->user()->name : $nurse->user->name }}</option>
                                  @foreach($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach

                              </select>
                          </div>

                      </div>
                  </div>
              @else
                  <div class="tab-pane fade" id="nurse" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="hcl">H.CL</label>
                              <input type="text" name="hcl" class="form-control" value="{{ old('hcl', $nurse->order->patient->dni) }}" >
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="frequency">Frecuencia HD</label>
                              <input type="text" name="frequency" class="form-control" value="{{ $nurse->frequency ? $nurse->frequency : $ultimaOrdenNoVacia->frequency }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="nhd">N° HD</label>
                              <input type="text" name="nhd" class="form-control" value="{{ $nurse->nhd ? $nurse->nhd : $ultimaOrdenNoVacia->nhd + 1 }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="others">Otros</label>
                              <select class="form-control" name="others" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{$nurse->others ? $nurse->others : $ultimaOrdenNoVacia->others}}">{{$nurse->others ? $nurse->others : $ultimaOrdenNoVacia->others}}</option>
                                  <option value="L - M - V">L - M - V</option>
                                  <option value="M - J - S">M - J - S</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="position">Puesto</label>
                              <input type="text" name="position" class="form-control" value="{{ $nurse->position ? $nurse->position : $ultimaOrdenNoVacia->position }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="aspect_dializer">Aspecto del dializador</label>
                              <input type="text" name="aspect_dializer" class="form-control" value="{{ $nurse->aspect_dializer ? $nurse->aspect_dializer : $ultimaOrdenNoVacia->aspect_dializer }}">
                          </div>
                      </div>
                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="start_pa">P.A. Inicial</label>
                              <input type="text" name="start_pa" class="form-control" value="{{ $nurse->start_pa ? $nurse->start_pa : $ultimaOrdenNoVacia->start_pa }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="end_pa">P.A. Final</label>
                              <input type="text" name="end_pa" class="form-control" value="{{ $nurse->end_pa ? $nurse->end_pa : $ultimaOrdenNoVacia->end_pa }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="start_weight">Peso Inicial</label>
                              <input type="text" name="start_weight" class="form-control" value="{{ $nurse->end_pa ? $nurse->end_pa : $ultimaOrdenNoVacia->order->medical->start_weight }}">
                          </div>

                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="end_weight">Peso Final</label>
                                  <input type="text" name="end_weight" class="form-control" value="{{ $nurse->end_weight ? $nurse->end_weight : $ultimaOrdenNoVacia->order->medical->dry_weight }}">
                              </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="machine">N° de Maquina</label>
                              <input type="text" name="machine" class="form-control" value="{{ $nurse->machine ? $nurse->machine : $ultimaOrdenNoVacia->machine }}">
                          </div>

                              <div class="form-group col-sm-12 col-lg-2">
                                  <label for="brand_model">Marca/Modelo</label>
                                  <input type="text" name="brand_model" class="form-control" value="{{ $nurse->brand_model ? $nurse->brand_model : $ultimaOrdenNoVacia->brand_model }}">
                              </div>

                      </div>

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="filter">Filtro</label>
                              <input type="text" name="filter" class="form-control" value="{{ $nurse->filter ? $nurse->filter : $ultimaOrdenNoVacia->filter }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="uf">UF</label>
                              <input type="text" name="uf" class="form-control" value="{{ $nurse->uf ? $nurse->uf : $ultimaOrdenNoVacia->order->medical->uf }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="access_arterial">ARTERIAL</label>
                              <select class="form-control" name="access_arterial" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{ $nurse->access_arterial ? $nurse->access_arterial : $ultimaOrdenNoVacia->access_arterial }}">{{ $nurse->access_arterial ? $nurse->access_arterial : $ultimaOrdenNoVacia->access_arterial }}</option>
                                  <option value="FAV">FAV</option>
                                  <option value="INJ">INJ</option>
                                  <option value="CVCL">CVCL</option>
                                  <option value="CVCLP">CVCLP</option>
                                  <option value="CVCT">CVCT</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="access_venoso">VENOSO</label>
                              <select class="form-control" name="access_venoso" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                  <option value="{{ $nurse->access_venoso ? $nurse->access_venoso : $ultimaOrdenNoVacia->access_venoso }}">{{ $nurse->access_venoso ? $nurse->access_venoso : $ultimaOrdenNoVacia->access_venoso }}</option>
                                  <option value="FAV">FAV</option>
                                  <option value="VP">VP</option>
                                  <option value="INJ">INJ</option>
                                  <option value="CVCL">CVCL</option>
                                  <option value="CVCLP">CVCLP</option>
                                  <option value="CVCT">CVCT</option>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-lg-4">
                              <label for="iron">Hierro</label>
                              <input type="text" name="iron" class="form-control" value="{{ $nurse->access_venoso ? $nurse->access_venoso : $ultimaOrdenNoVacia->iron }}">
                          </div>

                      </div>

                      <div class="row text-center">
                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="epo2000">EPO 2000</label>
                              <input type="number" name="epo2000" class="form-control" value="{{ $nurse->epo2000 ? $nurse->epo2000 : $ultimaOrdenNoVacia->epo2000 }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="epo4000">EPO 4000</label>
                              <input type="number" name="epo4000" class="form-control" value="{{ $nurse->epo4000 ? $nurse->epo4000 : $ultimaOrdenNoVacia->epo4000 }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="hidroxi">Hidroxicobalamina</label>
                              <input type="number" name="hidroxi" class="form-control" value="{{ $nurse->hidroxi ? $nurse->hidroxi : $ultimaOrdenNoVacia->hidroxi }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-2">
                              <label for="calcitriol">Calcitriol</label>
                              <input type="number" name="calcitriol" class="form-control" value="{{ $nurse->calcitriol ? $nurse->calcitriol : $ultimaOrdenNoVacia->calcitriol }}">
                          </div>

                          <div class="form-group col-sm-12 col-lg-4">
                              <label for="others_med">Otros Medicamentos</label>
                              <input type="text" name="others_med" class="form-control" value="{{ $nurse->others_med ? $nurse->others_med : $ultimaOrdenNoVacia->others_med }}">
                          </div>
                      </div>

                      <div class="row text-center">

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="s">S.- </label>
                              <textarea class="form-control" id="" name="s" rows="2" value="">{{ $nurse->s ? $nurse->s : $ultimaOrdenNoVacia->s }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="o">O.- </label>
                              <textarea class="form-control" id="" name="o" rows="2" value="">{{ $nurse->o ? $nurse->o : $ultimaOrdenNoVacia->o }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="a">A.- </label>
                              <textarea class="form-control" id="" name="a" rows="2" value="">{{ $nurse->a ? $nurse->a : $ultimaOrdenNoVacia->a }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="p">P.- </label>
                              <textarea class="form-control" id="" name="p" rows="2" value="">{{ $nurse->p ? $nurse->p : $ultimaOrdenNoVacia->p }}</textarea>
                          </div>

                      </div>

                      <div class="row text-center">

                          <div class="form-group col-sm-12 col-lg-9">
                              <label for="end_observation">Observación Final</label>
                              <textarea class="form-control" id="" name="end_observation" rows="3" value="">{{ $nurse->end_observation ? $nurse->end_observation : $ultimaOrdenNoVacia->end_observation }}</textarea>
                          </div>

                          <div class="form-group col-sm-12 col-lg-3">
                              <label for="user_id">USUARIO DE LA ATENCION</label>
                              <select class="form-control selectpicker" name="user_id" data-live-search="true" data-style="btn-info">
                                  <option value="{{ !$nurse->user_id ? auth()->user()->id : $nurse->user_id }}">{{ !$nurse->user_id ? auth()->user()->name : $nurse->user->name }}</option>
                                  @foreach($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach

                              </select>
                          </div>

                      </div>
                  </div>
              @endif


            @include('nurses.componentes.tratamientos')


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

@endsection
