<div class="my-4" id="tankTrailer" hidden>
    <div class="row my-4 text-center">
        <div class="col-sm-12 bg-custom text-white">
            <h5>Tank Trailer</h5>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mb-2 col-sm-3">
            <label class="col-form-label" for="volume">Volume Liters</label>
            <input type="text" name="volume" id="volume" class="form-control" value="{{ $vehicle->tankTrailer->volume ?? old('volume') }}">
        </div>
        <div class="form-group mb-2 col-sm-1">
            <label class="col-form-label mx-2" for="compartments">Comp</label>
            <select class="form-control" id="compartments" name="compartments" onchange="tanks()">
                <option value="1" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '1' ? "selected" : '' }} @endif>1</option>
                <option value="2" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '2' ? "selected" : '' }} @endif>2</option>
                <option value="3" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '3' ? "selected" : '' }} @endif>3</option>
                <option value="4" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '4' ? "selected" : '' }} @endif>4</option>
                <option value="5" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '5' ? "selected" : '' }} @endif>5</option>
                <option value="6" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '6' ? "selected" : '' }} @endif>6</option>
            </select>
        </div>

        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="madeof">Made</label>
            <input type="text" name="madeof" id="madeof" class="form-control" value="{{ $vehicle->tankTrailer->madeof ?? old('madeof') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="fuel">Fuel</label>
            <select name="fuel" id="fuel" class="form-control select2" multiple>
                <option value="gasoline">gasoline</option>
                <option value="diesel">diesel</option>
            </select>
        </div>
        <div class="form-group mb-2 col-sm-1">
            <label class="col-form-label mx-2" for="degassed">Degas</label>
            <select class="form-control" id="degassed" name="degassed">
                <option value="yes" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->degassed == 'yes' ? "selected" : '' }}@endif>Yes</option>
                <option value="no" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->degassed == 'no' ? "selected" : '' }}@endif>No</option>
            </select>
        </div>
    </div>
    @include('vehicles.parts.comp-form')
    <div class="form-row">
        <div class="form-group mb-2 col-sm-2">
            <label for="counter" class="col-form-label">{{ __('custom.tankTrailer.counter') }}</label>
            @if (!$vehicle->tankTrailer()->count())
            <select class="form-control" id="counter" name="counter">
                <option value="">Select value....</option>
                <option value="yesA" {{ old('counter') == 'yesA' ? "selected" : '' }}>Yes analogic</option>
                <option value="yesD" {{ old('counter') == 'yesD' ? "selected" : '' }}>Yes digital</option>
                <option value="no" {{ old('counter') == 'no' ? "selected" : '' }}>No</option>
            </select>
            @else
            <select class="form-control" id="counter" name="counter">
                <option value="">Select value....</option>
                <option value="yesA" {{ $vehicle->tankTrailer->counter == 'yesA' ? "selected" : '' }}>Yes analogic</option>
                <option value="yesD" {{ $vehicle->tankTrailer->counter == 'yesD' ? "selected" : '' }}>Yes digital</option>
                <option value="no" {{ $vehicle->tankTrailer->counter == 'no' ? "selected" : '' }}>No</option>
            </select>
            @endif
        </div>
        <div class="form-group mb-2 col-sm-4">
            <label for="bombBrand" class="col-form-label">Brand</label>
            <input name="bombBrand" type="text" class="form-control" id="bombBrand" value="{{ $vehicle->tankTrailer->bombBrand ?? old('bombBrand') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="minLPM" class="col-form-label">Min liters</label>
            <input name="minLPM" type="text" class="form-control" id="minLPM" value="{{ $vehicle->tankTrailer->minLPM ?? old('minLPM') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="maxLPM" class="col-form-label">Max liters</label>
            <input name="maxLPM" type="text" class="form-control" id="maxLPM" value="{{ $vehicle->tankTrailer->maxLPM ?? old('maxLPM') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="hose">Hose lenght</label>
            <input type="text" name="hose" id="hose" class="form-control" value="{{ $vehicle->tankTrailer->hose ?? old('hose') }}">
        </div>
    </div>
</div>
<script>
    function tanks(){
        var x = $('#compartments').val();
        switch(x){
            case "1":
                $('#liters2').hide();
                $('#liters3').hide();
                $('#liters4').hide();
                $('#liters5').hide();
                $('#liters6').hide();
                alert(`Número de compartimentos: ${$('#compartments').val()}`);
                break;
            case "2":
                $('#liters2').show();
                $('#liters3').hide();
                $('#liters4').hide();
                $('#liters5').hide();
                $('#liters6').hide();
                break;
            case "3":
                $('#liters2').show();
                $('#liters3').show();
                $('#liters4').hide();
                $('#liters5').hide();
                $('#liters6').hide();
                break;
            case "4":
                $('#liters2').show();
                $('#liters3').show();
                $('#liters4').show();
                $('#liters5').hide();
                $('#liters6').hide();
                break;
            case "5":
                $('#liters2').show();
                $('#liters3').show();
                $('#liters4').show();
                $('#liters5').show();
                $('#liters6').hide();
                break;
            case "6":
                $('#liters2').show();
                $('#liters3').show();
                $('#liters4').show();
                $('#liters5').show();
                $('#liters6').show();
                break;
            default:
                // code block
        }
    }

    function isTank(){
        if ($('#type').val()=='5' || $('#type').val()=='8' ) {
            $('#tankTrailer').attr('hidden',false);
        } else {
            $('#tankTrailer').attr('hidden',true);
        }
    }
</script>
