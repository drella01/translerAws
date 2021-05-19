<div class="my-4" id="tankTrailer" hidden>
    <div class="row my-4 text-center">
        <div class="col-sm-12 bg-custom text-white">
            <h5>Tank Trailer</h5>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mb-2 col-sm-3">
            <label class="col-form-label" for="volume">Volume Liters</label>
            <input type="text" name="volume" id="volume" class="form-control">
        </div>
        <div class="form-group mb-2 col-sm-1">
            <label class="col-form-label mx-2" for="compartments">Comp</label>
            <select class="form-control" id="compartments" name="compartments" onchange="tanks()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="madeof">Made</label>
            <input type="text" name="madeof" id="madeof" class="form-control">
        </div>
        <div class="form-group mb-2 col-sm-3">
            <label class="col-form-label mx-2" for="fuel">Fuel</label>
            <select name="fuel" id="fuel" class="form-control select2" multiple>
                <option value="gasoline">gasoline</option>
                <option value="diesel">diesel</option>
            </select>
        </div>
        <div class="form-group mb-2 col-sm-1">
            <label class="col-form-label mx-2" for="degassed">Degas</label>
            <select class="form-control" id="degassed" name="degassed">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
    </div>
    @include('vehicles.parts.comp-form')
    <div class="form-row">
        <div class="form-group mb-2 col-sm-2">
            <label for="counter" class="col-form-label">Counter</label>
            <select class="form-control" id="counter" name="counter">
                <option value="yesA">Yes analogic</option>
                <option value="yesD">Yes digital</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="form-group mb-2 col-sm-4">
            <label for="bombBrand" class="col-form-label">Brand</label>
            <input name="bombBrand" type="text" class="form-control" id="bombBrand">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="minLPM" class="col-form-label">Min liters</label>
            <input name="minLPM" type="text" class="form-control" id="minLPM">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="maxLPM" class="col-form-label">Max liters</label>
            <input name="maxLPM" type="text" class="form-control" id="maxLPM">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="hose">Hose lenght</label>
            <input type="text" name="hose" id="hose" class="form-control">
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
