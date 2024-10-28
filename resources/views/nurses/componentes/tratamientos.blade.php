<div class="row text-center">
    <div class="form-group col-sm-12 col-lg-1">
        <label for="hr">HR</label>
        <input type="time" name="hr" id="hr" class="form-control" value="{{ old('hr', $nurse->hr) }}">
    </div>

    @if($nurse->pa == null)
        <div class="form-group col-sm-12 col-lg-1">
            <label for="pa">PA</label>
            <input type="text" name="pa" class="form-control @error('pa') border border-danger @enderror" value="{{ old('pa', $nurse->order->medical->start_pa) }}">
        </div>
    @else
        <div class="form-group col-sm-12 col-lg-1">
            <label for="pa">PA</label>
            <input type="text" name="pa" class="form-control @error('pa') border border-danger @enderror" value="{{ old('pa', $nurse->pa) }}">
        </div>
    @endif

    <div class="form-group col-sm-12 col-lg-1">
        <label for="fc1">FC</label>
        <input type="text" name="fc1" class="form-control @error('fc1') border border-danger @enderror" value="{{ !$nurse->fc1 ? $nurse->order->medical->fc : $nurse->fc1 }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="qb">QB</label>
        <input type="text" name="qb" class="form-control @error('qb') border border-danger @enderror" value="{{ old('qb', $nurse->qb) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="cnd">CND</label>
        <input type="text" name="cnd" class="form-control @error('cnd') border border-danger @enderror" value="{{ old('cnd', $nurse->cnd) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="ra">RA</label>
        <input type="text" name="ra" class="form-control @error('ra') border border-danger @enderror" value="{{ old('ra', $nurse->ra) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="rv">RV</label>
        <input type="text" name="rv" class="form-control @error('rv') border border-danger @enderror" value="{{ old('rv', $nurse->rv) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <label for="ptm">PTM</label>
        <input type="text" name="ptm" class="form-control @error('ptm') border border-danger @enderror" value="{{ old('ptm', $nurse->ptm) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <label for="obs">Observación</label>
        <textarea class="form-control @error('obs') border border-danger @enderror" id="" name="obs" rows="1">{{ old('obs', $nurse->obs) }}</textarea>
    </div>
</div>

<div class="row text-center">

    <div class="form-group col-sm-12 col-lg-1">
        <input type="time" name="hr2" class="form-control" value="{{ $nurse->hr2 }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="pa2" class="form-control @error('pa2') border border-danger @enderror" value="{{ old('pa2', $nurse->pa2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="fc2" class="form-control @error('fc2') border border-danger @enderror" value="{{ old('fc2', $nurse->fc2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="qb2" class="form-control @error('qb2') border border-danger @enderror" value="{{ old('qb2', $nurse->qb2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="cnd2" class="form-control @error('cnd2') border border-danger @enderror" value="{{ old('cnd2', $nurse->cnd2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ra2" class="form-control @error('ra2') border border-danger @enderror" value="{{ old('ra2', $nurse->ra2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="rv2" class="form-control @error('rv2') border border-danger @enderror" value="{{ old('rv2', $nurse->rv2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ptm2" class="form-control @error('ptm2') border border-danger @enderror" value="{{ old('ptm2', $nurse->ptm2) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <textarea class="form-control @error('obs2') border border-danger @enderror" id="" name="obs2" rows="1">{{ old('obs2', $nurse->obs2) }}</textarea>
    </div>
</div>

<div class="row text-center">
    <div class="form-group col-sm-12 col-lg-1">
        <input type="time" name="hr3" class="form-control" value="{{ $nurse->hr3 }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="pa3" class="form-control @error('pa3') border border-danger @enderror" value="{{ old('pa3', $nurse->pa3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="fc3" class="form-control @error('fc3') border border-danger @enderror" value="{{ old('fc3', $nurse->fc3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="qb3" class="form-control @error('qb3') border border-danger @enderror" value="{{ old('qb3', $nurse->qb3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="cnd3" class="form-control @error('cnd3') border border-danger @enderror" value="{{ old('cnd3', $nurse->cnd3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ra3" class="form-control @error('ra3') border border-danger @enderror" value="{{ old('ra3', $nurse->ra3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="rv3" class="form-control @error('rv3') border border-danger @enderror" value="{{ old('rv3', $nurse->rv3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ptm3" class="form-control @error('ptm3') border border-danger @enderror" value="{{ old('ptm3', $nurse->ptm3) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <textarea class="form-control @error('obs3') border border-danger @enderror" id="" name="obs3" rows="1">{{ old('obs3', $nurse->obs3) }}</textarea>
    </div>
</div>

<div class="row text-center">
    <div class="form-group col-sm-12 col-lg-1">
        <input type="time" name="hr4" class="form-control" value="{{ old('hr4', $nurse->hr4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="pa4" class="form-control @error('pa4') border border-danger @enderror" value="{{ old('pa4', $nurse->pa4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="fc4" class="form-control @error('fc4') border border-danger @enderror" value="{{ old('fc4', $nurse->fc4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="qb4" class="form-control @error('qb4') border border-danger @enderror" value="{{ old('qb4', $nurse->qb4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="cnd4" class="form-control @error('cnd4') border border-danger @enderror" value="{{ old('cnd4', $nurse->cnd4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ra4" class="form-control @error('ra4') border border-danger @enderror" value="{{ old('ra4', $nurse->ra4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="rv4" class="form-control @error('rv4') border border-danger @enderror" value="{{ old('rv4', $nurse->rv4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ptm4" class="form-control @error('ptm4') border border-danger @enderror" value="{{ old('ptm4', $nurse->ptm4) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <textarea class="form-control @error('obs4') border border-danger @enderror" id="" name="obs4" rows="1">{{ old('obs4', $nurse->obs4) }}</textarea>
    </div>
</div>

<div class="row text-center">
    <div class="form-group col-sm-12 col-lg-1">
        <input type="time" name="hr5" class="form-control" value="{{ old('hr5', $nurse->hr5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="pa5" class="form-control @error('pa5') border border-danger @enderror" value="{{ old('pa5', $nurse->pa5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="fc5" class="form-control @error('fc5') border border-danger @enderror" value="{{ old('fc5', $nurse->fc5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="qb5" class="form-control @error('qb5') border border-danger @enderror" value="{{ old('qb5', $nurse->qb5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="cnd5" class="form-control @error('cnd5') border border-danger @enderror" value="{{ old('cnd5', !$nurse->cnd5 ? "-" : $nurse->cnd5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ra5" class="form-control @error('ra5') border border-danger @enderror" value="{{ old('ra5', !$nurse->ra5 ? "-" : $nurse->ra5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="rv5" class="form-control @error('rv5') border border-danger @enderror" value="{{ old('rv5', !$nurse->rv5 ? "-" : $nurse->rv5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-1">
        <input type="text" name="ptm5" class="form-control @error('ptm5') border border-danger @enderror" value="{{ old('ptm5', !$nurse->ptm5 ? "-" : $nurse->ptm5) }}">
    </div>

    <div class="form-group col-sm-12 col-lg-4">
        <textarea class="form-control @error('obs5') border border-danger @enderror" id="" name="obs5" rows="1">{{ old('obs5', $nurse->obs5) }}</textarea>
    </div>
</div>
