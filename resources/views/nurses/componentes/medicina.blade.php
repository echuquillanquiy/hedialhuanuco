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
