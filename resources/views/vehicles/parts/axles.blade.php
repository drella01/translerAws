<div class="row my-4 text-center">
    <div class="col-sm-12 bg-custom text-white">
        <h5>{{ __('custom.brakesAxles') }}</h5>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-2">
        <label for="isDir">Is directional</label>
        <select name="isDir[]" id="brake" class="form-control" default="yes">
            <option value="yes">yes</option>
            <option value="no">no</option>
        </select>
    </div>
    <div class="form-group col-sm-2">
        <label for="isDouble">Is double</label>
        <select name="isDouble[]" id="brake" class="form-control" default="no">
            <option value="no">no</option>
            <option value="yes">yes</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="brake">Brake</label>
        <select name="brake[]" id="brake" class="form-control">
            <option value="">{{ __('custom.selectBrake') }}</option>
            <option value="disco">disco</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('brake', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="suspension">Suspension</label>
        <select name="suspension[]" id="suspension" class="form-control">
            <option value="">{{ __('custom.selectSuspension') }}</option>
            <option value="ballesta">ballesta</option>
            <option value="neumatico">neumatico</option>
        </select>
        {!! $errors->first('suspension', '<span class=error>:message</span>') !!}
    </div>
</div>
<div id="numberOfAxles"></div>
<script>
    function ejes(){
        $('#numberOfAxles').empty();
        var i;
        for (i = 0; i < $('#axles').val()-1; i++) {
            $("#numberOfAxles").append(`<div class="form-row"><div class="form-group col-sm-2"><label for="isDir">Is directional</label><select name="isDir[]" id="isDir" class="form-control" default="yes"><option value="yes">yes</option><option value="no">no</option></select></div><div class="form-group col-sm-2"><label for="isDouble">Is double</label><select name="isDouble[]" id="double" class="form-control" default="no"><option value="no">no</option><option value="yes">yes</option></select></div><div class="form-group col-sm-4"><label for="brake">Brake</label><select name="brake[]" id="brake" class="form-control"><option value="">{{ __('custom.selectBrake') }}</option><option value="disco">disco</option><option value="neumatico">neumatico</option></select>{!! $errors->first('brake', '<span class=error>:message</span>') !!}</div><div class="form-group col-sm-4"><label for="suspension">Suspension</label><select name="suspension[]" id="suspension" class="form-control"><option value="">{{ __('custom.selectSuspension') }}</option><option value="ballesta}">ballesta</option><option value="neumatico">neumatico</option></select>{!! $errors->first('suspension', '<span class=error>:message</span>') !!}</div>`);
        }
    }
</script>
