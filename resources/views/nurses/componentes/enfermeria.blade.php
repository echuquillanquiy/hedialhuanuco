<div class="row text-center">

    <input type="hidden" name="hcl" class="form-control" value="{{ !$nurse->hcl ? $nurse->order->patient->dni : $nurse->hcl }}">

    <input type="hidden" name="frequency" class="form-control" value="{{ old('frequency', '3', $nurse->frequency) }}">

    <input type="hidden" name="nhd" class="form-control" value="{{ $nurse->nhd }}">

    <input type="hidden" name="others" value="{{ $nurse->others }}">


    <div class="form-group col-sm-12 col-lg-2">
        <label for="start_weight">Peso Inicial</label>
        <input type="text" name="start_weight" class="form-control" value="{{ !$nurse->start_weight ? $nurse->order->medical->start_weight : $nurse->start_weight }}">
    </div>

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
        <label for="position">Puesto</label>
        <input type="text" name="position" id="position" class="form-control @error('position') border border-danger @enderror" value="{{ !$nurse->position ? optional($ultimaOrdenNoVacia)->position : $nurse->position }}" oninput="syncFields()">
        @error('position')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="machine">N° de Maquina</label>
        <input type="text" name="machine" id="machine" class="form-control @error('machine') border border-danger @enderror" value="{{ !$nurse->machine ? optional($ultimaOrdenNoVacia)->machine : $nurse->machine }}">
        @error('machine')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <label for="">Área del dializador</label>
        <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->area_filter }}" disabled>
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="brand_model">Marca/Modelo</label>
        <input type="text" name="brand_model" class="form-control" value="{{ !$nurse->brand_model ? optional($ultimaOrdenNoVacia)->brand_model : $nurse->brand_model}}" >
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <label for="">Membrana del dializador</label>
        <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->membrane }}" disabled>
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="">Peso seco</label>
        <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->dry_weight }}" disabled>
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="uf">UF</label>
        <input type="text" name="uf" class="form-control" value="{{ !$nurse->uf ? $nurse->order->medical->uf : $nurse->uf }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="access_arterial">ACCESO ARTERIAL</label>
        <select class="form-control @error('access_arterial') border border-danger @enderror" name="access_arterial" data-toggle="select" title="Simple select" data-placeholder="Select a state">
            <option value="{{ $nurse->access_arterial }}">{{ !$nurse->access_arterial ? optional($ultimaOrdenNoVacia)->access_arterial : $nurse->access_arterial }}</option>
            <option value="CVCT">CVCT</option>
            <option value="CVC-LP">CVC-LP</option>
            <option value="FAV">FAV</option>
            <option value="Vp">Vp</option>
            <option value="Injerto">Injerto</option>
        </select>
        @error('access_arterial')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="access_venoso">ACCESO VENOSO</label>
        <select class="form-control @error('access_venoso') border border-danger @enderror" name="access_venoso" data-toggle="select" title="Simple select" data-placeholder="Select a state">
            <option value="{{ $nurse->access_venoso }}">{{ !$nurse->access_venoso ? optional($ultimaOrdenNoVacia)->access_venoso : $nurse->access_venoso }}</option>
            <option value="CVCT">CVCT</option>
            <option value="CVC-LP">CVC-LP</option>
            <option value="FAV">FAV</option>
            <option value="Vp">Vp</option>
            <option value="Injerto">Injerto</option>
        </select>
        @error('access_venoso')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="iron">Hierro</label>
        <input type="text" name="iron" class="form-control" value="{{ old('iron', !$nurse->iron ? "0" : $nurse->iron) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="epo2000">EPO 2000</label>
        <input type="number" name="epo2000" class="form-control" value="{{ old('epo2000', !$nurse->epo2000 ? "0" : $nurse->epo2000) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="epo4000">EPO 4000</label>
        <input type="number" name="epo4000" class="form-control" value="{{ old('epo4000', !$nurse->epo4000 ? "0" : $nurse->epo4000) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="hidroxi">Hidroxicobalamina</label>
        <input type="number" name="hidroxi" class="form-control" value="{{ old('hidroxi', !$nurse->hidroxi ? "0" : $nurse->hidroxi) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="calcitriol">Calcitriol</label>
        <input type="number" name="calcitriol" class="form-control" value="{{ old('calcitriol', !$nurse->calcitriol ? "0" : $nurse->calcitriol) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="others_med">Otros Medicamentos</label>
        <input type="text" name="others_med" class="form-control" value="{{ old('others_med', !$nurse->others_med ? "0" : $nurse->others_med) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-12">
        <label for="s">VALORACION DE ENFERMERIA </label>
        <textarea class="form-control @error('s') border border-danger @enderror" id="" name="s" rows="3">{{ old('s', !$nurse->s ? optional($ultimaOrdenNoVacia)->s : $nurse->s) }}</textarea>
        @error('s')
            <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-6">
        <label for="end_observation">Observación Final</label>
        <textarea class="form-control @error('end_observation') border border-danger @enderror" id="" name="end_observation" rows="3">{{ old('end_observation', !$nurse->end_observation ? optional($ultimaOrdenNoVacia)->end_observation : $nurse->end_observation) }}</textarea>
        @error('end_observation')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="end_pa">P.A. Final</label>
        <input type="text" name="end_pa" class="form-control @error('end_pa') border border-danger @enderror" value="{{ !$nurse->end_pa ? $nurse->pa5 : $nurse->end_pa }}">
        @error('end_pa')
        <div class="text-danger text-center text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-lg-2">
        <label for="aspect_dializer">Aspecto del dializador</label>
        <input type="text" name="aspect_dializer" class="form-control" value="{{ !$nurse->aspect_dializer ? "0" : $nurse->aspect_dializer }}">

    </div>

    @if($nurse->end_weight)
        <div class="form-group col-sm-12 col-lg-2">
            <label for="end_weight">Peso Final</label>
            <input type="text" name="end_weight" class="form-control @error('end_weight') border border-danger @enderror" value="{{ old('end_weight', $nurse->end_weight) }}">
            @error('end_weight')
            <div class="text-danger text-center text-sm">{{ $message }}</div>
            @enderror
        </div>
    @else
        <div class="form-group col-sm-12 col-lg-2">
            <label for="end_weight">Peso Final</label>
            <input type="text" name="end_weight" class="form-control @error('end_weight') border border-danger @enderror" value="{{ old('end_weight', $nurse->order->medical->end_weight) }}">
            @error('end_weight')
            <div class="text-danger text-center text-sm">{{ $message }}</div>
            @enderror
        </div>
    @endif

    <div class="form-group col-sm-12 col-lg-4">
        <label for="user_id">ENFERMERO(A) QUE INICIA</label>
        <select class="form-control selectpicker" name="user_id" data-live-search="true" data-style="btn-info">
            <option value="{{ !$nurse->user_id ? auth()->user()->id : $nurse->user_id }}">{{ !$nurse->user_id ? auth()->user()->name : $nurse->user->name }}</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <label for="enfermero_final">ENFERMERO(A) QUE FINALIZA</label>
        <select class="form-control selectpicker" name="enfermero_final" data-live-search="true" data-style="btn-info">
            <option value="{{ $nurse->enfermero_final }}">{{ $nurse->enfermero_final }}</option>
            @foreach($users as $user)
                <option value="{{ $user->name }}">{{ $user->name }}</option>
            @endforeach

        </select>
    </div>

</div>



