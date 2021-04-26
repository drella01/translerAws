<div class="form-row">
    <div class="form-group col-md-6">
        <label for="brake">Brake</label>
        <select name="brake[]" id="brake" class="form-control">
            <option value="">{{ __('custom.selectBrake') }}</option>
            <option value="disco">disco</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('brake', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-6">
        <label for="suspension">Suspension</label>
        <select name="suspension[]" id="suspension" class="form-control">
            <option value="">{{ __('custom.selectSuspension') }}</option>
            <option value="ballesta">ballesta</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('suspension', '<span class=error>:message</span>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="brake">Brake</label>
        <select name="brake[]" id="brake" class="form-control">
            <option value="">{{ __('custom.selectBrake') }}</option>
            <option value="disco">disco</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('brake', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-6">
        <label for="suspension">Suspension</label>
        <select name="suspension[]" id="suspension" class="form-control">
            <option value="">{{ __('custom.selectSuspension') }}</option>
            <option value="ballesta}">ballesta</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('suspension', '<span class=error>:message</span>') !!}
    </div>
</div>
