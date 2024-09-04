<div class="tab-pane fade show active" id="medical" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">



        <div class="row">

                <div class="form-group col-sm-12 col-lg-4">
                    <label for="clinical_trouble">Problemas Clínicos</label>
                    <textarea class="form-control" id="" name="clinical_trouble" rows="2" readonly>{{ $nurse->order->medical->clinical_trouble }}</textarea>
                </div>

                <div class="form-group col-sm-12 col-lg-4">
                    <label for="signal">Signos y Sintomas</label>
                    <textarea class="form-control" id="" name="signal" rows="2" readonly>{{ old('signal', $nurse->order->medical->signal) }}</textarea>
                </div>

            <div class="form-group col-sm-12 col-lg-4">
                <label for="fua_observacion">Observaciones</label>
                <textarea class="form-control" id="" name="fua_observacion" rows="2" readonly>{{ old('fua_observacion', $nurse->order->medical->fua_observacion) }}</textarea>
            </div>

        </div>

        <div class="row">


            <div class="form-group col-sm-12 col-lg-4">
                <label for="start_pa">PA Inicial</label>
                <input type="text" name="start_pa" class="form-control" value="{{ old('start_pa', $nurse->order->medical->start_pa) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-4">
                <label for="fc">Frecuencia Cardiaca</label>
                <input type="text" name="fc" class="form-control" value="{{ old('fc', $nurse->order->medical->fc) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-4">
                <label for="serology">Serologia</label>
                <input type="text" name="serology" class="form-control" value="{{ old('serology', $nurse->order->medical->serology) }}" readonly>
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
                <input type="text" name="hour_hd" class="form-control" value="{{ old('hour_hd', $nurse->order->medical->hour_hd) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="heparin">Heparina</label>
                    <input type="text" name="heparin" class="form-control" value="{{ old('heparin', $nurse->order->medical->heparin) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="start_weight">Peso Inicial</label>
                <input type="text" name="start_weight" class="form-control" value="{{ old('start_weight', $nurse->order->medical->start_weight) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="dry_weight">Peso Seco</label>
                <input type="text" name="dry_weight" class="form-control" value="{{ old('dry_weight', $nurse->order->medical->dry_weight) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="uf">UF</label>
                <input type="text" name="uf" class="form-control" value="{{ old('uf', $nurse->order->medical->uf) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="qb">QB</label>
                <input type="text" name="qb" class="form-control" value="{{ old('qb', $nurse->order->medical->qb) }}" readonly>
            </div>

                <div class="form-group col-sm-12 col-lg-1">
                    <label for="qd">QD</label>
                    <input type="text" name="qd" class="form-control" value="{{ old('qd', $nurse->order->medical->qd) }}" readonly>
                </div>

                <div class="form-group col-sm-12 col-lg-3">
                    <label for="bicarbonat">Buffer</label>
                    <input type="text" name="bicarbonat" class="form-control" value="{{ old('bicarbonat', $nurse->order->medical->bicarbonat) }}" readonly>
                </div>

        </div>

        <div class="row">

            <div class="form-group col-sm-12 col-lg-1">
                <label for="cnd">CND</label>
                <input type="text" name="cnd" class="form-control" value="{{ old('cnd', $nurse->order->medical->cnd) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="start_na">NA INICIAL</label>
                <input type="text" name="start_na" class="form-control" value="{{ old('start_na', $nurse->order->medical->start_na) }}" readonly>
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="end_na">NA FINAL</label>
                <input type="text" name="end_na" class="form-control" value="{{ old('end_na', $nurse->order->medical->end_na) }}" readonly>
            </div>

                <div class="form-group col-sm-12 col-lg-1">
                    <label for="profile_na">Perfil Na</label>
                    <input type="text" name="profile_na" class="form-control" value="{{ old('profile_na', $nurse->order->medical->profile_na) }}" readonly>
                </div>

                <div class="form-group col-sm-12 col-lg-2">
                    <label for="profile_uf">Perfil UF:</label>
                    <input type="text" name="profile_uf" class="form-control" value="{{ old('profile_uf', $nurse->order->medical->profile_uf) }}" readonly>
                </div>

            <div class="form-group col-sm-12 col-lg-3">
                <label for="area_filter">ÁREA/FILTRO</label>
                <input type="text" name="area_filter" class="form-control" value="{{ old('area_filter', $nurse->order->medical->area_filter) }}" readonly>
            </div>

                <div class="form-group col-sm-12 col-lg-3">
                    <label for="membrane">MEMBRANA</label>
                    <input type="text" name="membrane" class="form-control" value="{{ old('membrane', $nurse->order->medical->membrane) }}" readonly>
                </div>


            <!--      <div class="form-group col-sm-12 col-lg-2">
            <label for="serological">Cond. Serologica</label>
            <select class="form-control" name="serological" data-toggle="select" title="Simple select" data-placeholder="Select a state">
              <option value="{{ $nurse->order->medical->serological }}" disabled="">{{ $nurse->order->medical->serological }}</option>
              <option value="NEGATIVO">NEGATIVO</option>
              <option value="POSITIVO">POSITIVO</option>
            </select>
          </div>-->
        </div>

        <div class="row">


            <!--      <div class="form-group col-sm-12 col-lg-3">
        <label for="dializer">Dializador</label>
        @if ( $nurse->order->medical->dializar != null )
                <input type="text" name="dializer" class="form-control" value="{{ $nurse->order->medical->dializer }}">
        @else
                <input type="text" name="dializer" class="form-control" value="{{ old('dializer', 'ELISIO') }}">
        @endif

            </div>-->
            <div class="form-group col-sm-12 col-lg-6">
                    <label for="end_evaluation">Evaluación Final</label>
                    <textarea class="form-control" id="" name="end_evaluation" rows="2" readonly>{{ old('end_evaluation' ,$nurse->order->medical->end_evaluation) }}</textarea>
                </div>


            {{--<div class="form-group col-sm-12 col-lg-4">
                <label for="fua_observacion">OBSERVACIONES</label>
                <textarea class="form-control" id="" name="fua_observacion" rows="2">{{ old('fua_observacion' ,$medical->fua_observacion) }}</textarea>
            </div>--}}

            <div class="form-group col-sm-12 col-lg-2">
                <label for="end_hour">Hora final</label>
                <input type="time" name="end_hour" class="form-control" value="{{ old('end_hour', $nurse->order->medical->end_hour) }}" readonly>
            </div>

        </div>

    </div>

