<div class="row my-4 text-center">
    <div class="col-sm-12 bg-custom text-white">
        <h5>{{ __('custom.brakesAxles') }}</h5>
    </div>
</div>
@foreach ($vehicle->axlesDetail as $item)
    <div class="form-row">
        <div class="form-group col-sm-2">
            <label for="isDir">Is directional</label>
            <select name="isDir[]" id="brake" class="form-control" default=1>
                <option value=1 {{ $item->isDir == 1 ? "selected" : '' }}>yes</option>
                <option value=0 {{ $item->isDir == 0 ? "selected" : '' }}>no</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label for="isDouble">Is double</label>
            <select name="isDouble[]" id="brake" class="form-control" default=0>
                <option value=0 {{ $item->isDouble == 0 ? "selected" : '' }}>no</option>
                <option value=1 {{ $item->isDouble == 1 ? "selected" : '' }}>yes</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="brake">Brake</label>
            <select name="brake[]" id="brake" class="form-control">
                <option value="">{{ __('custom.selectBrake') }}</option>
                <option value="disco" {{ $item->brake == 'disco' ? "selected" : '' }}>disco</option>
                <option value="neumatico" {{ $item->brake == 'neumatico' ? "selected" : '' }}>neumatico</option>
            </select>
            {!! $errors->first('brake', '<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-md-4">
            <label for="suspension">Suspension</label>
            <select name="suspension[]" id="suspension" class="form-control">
                <option value="">{{ __('custom.selectSuspension') }}</option>
                <option value="ballesta" {{ $item->suspension == 'ballesta' ? "selected" : '' }}>ballesta</option>
                <option value="neumatico" {{ $item->suspension == 'neumatico' ? "selected" : '' }}>neumatico</option>
            </select>
            {!! $errors->first('suspension', '<span class=error>:message</span>') !!}
        </div>
    </div>
@endforeach
