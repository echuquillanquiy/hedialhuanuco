@if(!$ultimaOrdenNoVacia)

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
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $nurse->position) }}" oninput="syncFields()">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="machine">N° de Maquina</label>
                <input type="text" name="machine" id="machine" class="form-control" value="{{ old('machine', $nurse->machine) }}">
            </div>

            <div class="form-group col-sm-12 col-lg-4">
                <label for="">Área del dializador</label>
                <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->area_filter }}">
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

            <div class="form-group col-sm-12 col-lg-4">
                <label for="">Membrana del dializador</label>
                <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->membrane }}">
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="">Peso seco</label>
                <input type="text" name="" class="form-control" value="{{ $nurse->order->medical->dry_weight }}">
            </div>

            <div class="form-group col-sm-12 col-lg-1">
                <label for="uf">UF</label>
                <input type="text" name="uf" class="form-control" value="{{ !$nurse->uf ? $nurse->order->medical->uf : $nurse->uf }}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="access_arterial">ACCESO ARTERIAL</label>
                <select class="form-control" name="access_arterial" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                    <option value="{{ $nurse->access_arterial }}">{{ old('access_arterial',$nurse->access_arterial) }}</option>
                    <option value="CVCT">CVCT</option>
                    <option value="CVC-LP">CVC-LP</option>
                    <option value="FAV">FAV</option>
                    <option value="Vp">Vp</option>
                    <option value="Injerto">Injerto</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="access_venoso">ACCESO VENOSO</label>
                <select class="form-control" name="access_venoso" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                    <option value="{{ $nurse->access_venoso }}">{{ old('access_venoso', $nurse->access_venoso) }}</option>
                    <option value="CVCT">CVCT</option>
                    <option value="CVC-LP">CVC-LP</option>
                    <option value="FAV">FAV</option>
                    <option value="Vp">Vp</option>
                    <option value="Injerto">Injerto</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="iron">Hierro</label>
                <input type="text" name="iron" class="form-control" value="{{ old('iron', !$nurse->iron ? $nurse->order->medical->iron : $nurse->iron) }}">
            </div>

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

            <div class="form-group col-sm-12 col-lg-2">
                <label for="others_med">Otros Medicamentos</label>
                <input type="text" name="others_med" class="form-control" value="{{ old('others_med', $nurse->others_med) }}">
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                <label for="s">VALORACION DE ENFERMERIA </label>
                <textarea class="form-control" id="" name="s" rows="3">{{ old('s', $nurse->s) }}</textarea>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="end_observation">Observación Final</label>
                <textarea class="form-control" id="" name="end_observation" rows="3">{{ old('end_observation', $nurse->end_observation) }}</textarea>
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="end_pa">P.A. Final</label>
                <input type="text" name="end_pa" class="form-control" value="{{ !$nurse->end_pa ? $nurse->pa5 : $nurse->end_pa }}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="aspect_dializer">Aspecto del dializador</label>
                <input type="text" name="aspect_dializer" class="form-control" value="{{ !$nurse->aspect_dializer ? "0" : $nurse->aspect_dializer }}">
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

        <div class="row text-center">
            {{--<div class="form-group col-sm-12 col-lg-2">
                <label for="filter">Filtro</label>
                <input type="text" name="filter" class="form-control" value="{{ old('filter', $nurse->filter) }}">
            </div>--}}

        </div>


@else
        <div class="row text-center">

            <input type="hidden" name="hcl" class="form-control" value="{{ !$nurse->hcl ? $nurse->order->patient->dni : $nurse->hcl }}">

            <input type="hidden" name="frequency" class="form-control" value="{{ old('frequency', '3', $nurse->frequency) }}">

            <input type="hidden" name="nhd" class="form-control" value="{{ $nurse->nhd }}">

            <input type="hidden" name="others" value="{{ $nurse->others }}">

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
                <input type="text" name="start_weight" class="form-control" value="{{ $nurse->start_weight ? $nurse->start_weight : $ultimaOrdenNoVacia->order->medical->start_weight }}">
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
                <input type="number" name="epo2000" class="form-control" value="{{ !$nurse->epo2000 ? $nurse->epo2000 : 0 }}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="epo4000">EPO 4000</label>
                <input type="number" name="epo4000" class="form-control" value="{{ !$nurse->epo4000 ? $nurse->epo4000 : 0 }}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="hidroxi">Hidroxicobalamina</label>
                <input type="number" name="hidroxi" class="form-control" value="{{ !$nurse->hidroxi ? $nurse->hidroxi : 0}}">
            </div>

            <div class="form-group col-sm-12 col-lg-2">
                <label for="calcitriol">Calcitriol</label>
                <input type="number" name="calcitriol" class="form-control" value="{{ !$nurse->calcitriol ? $nurse->calcitriol : 0 }}">
            </div>

            <div class="form-group col-sm-12 col-lg-4">
                <label for="others_med">Otros Medicamentos</label>
                <input type="text" name="others_med" class="form-control" value="{{ !$nurse->others_med ? $nurse->others_med : 0 }}">
            </div>
        </div>

        <div class="row text-center">

            <div class="form-group col-sm-12 col-lg-12">
                <label for="s">VALORACION DE ENFERMERIA </label>
                <textarea class="form-control" id="" name="s" rows="3"  value="">{{ $nurse->s ? $nurse->s : $ultimaOrdenNoVacia->s }}</textarea>
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

@endif

<script>
    function syncFields() {
        var position = document.getElementById('position').value;
        document.getElementById('machine').value = position;
    }
</script>
