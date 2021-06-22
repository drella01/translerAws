<form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="registration"><h5>Registration</h5></label>
                <input type="text" class="form-control" name="registration" id="registration" value="{{$vehicle->registration}}" {{ $status ?? 'disabled' }}>
            </div>
        </div>
        <div class="col">
            <label for="reg_date"><h5>First registration</h5></label>
            <input type="text" class="form-control" name="reg_date" id="reg_date" value="{{ $vehicle->reg_date ?? $vehicle->created_at->format('d-m-Y') }} " {{ $status ?? 'disabled' }}>
        </div>
        <div class="col">
            <label for="type_id"><h5>Type</h5></label>
            <input type="text" class="form-control" name="type_id" id="type_id" value="{{$vehicle->type->id}}" {{ $status ?? 'disabled' }}>
        </div>
        <div class="col">
            <label for="brand"><h5>Brand</h5></label>
            <input type="text" class="form-control" name="brand" id="brand" value="{{$vehicle->brand}}" {{ $status ?? 'disabled' }}>
        </div>
        <div class="col">
            <label for="model"><h5>Model</h5></label>
            <input type="text" class="form-control" name="model" id="model" value="{{$vehicle->model}}" {{ $status ?? 'disabled' }} placeholder="insert model">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <label for="kms"><h5>Kilometres</h5></label>
            <input type="text" class="form-control-plaintext" name="kms" id="kms" value="{{ $vehicle->kms }}" readonly>
        </div>
        <div class="col">
            <label for="mma"><h5>Tara</h5></label>
            <input type="text" class="form-control" name="tara" id="tara" value="{{ $vehicle->tara}}" {{ $status ?? 'disabled' }} placeholder="insert tara">
        </div>
        <div class="col">
            <label for="mma"><h5>MMA</h5></label>
            <input type="text" class="form-control" name="mma" id="mma" value="{{ $vehicle->mma}}" {{ $status ?? 'disabled' }} placeholder="insert mma">
        </div>
        <div class="col">
            <label for="axles">{{ __('custom.axle') }}</label>
            <select class="form-control" id="axles" name="axles" onchange="ejes()">
                <option value="">Select....</option>
                <option value="1" @if($vehicle->axles){{ $vehicle->axles == '1' ? "selected" : '' }} @endif>1</option>
                <option value="2" @if($vehicle->axles){{ $vehicle->axles == '2' ? "selected" : '' }} @endif>2</option>
                <option value="3" @if($vehicle->axles){{ $vehicle->axles == '3' ? "selected" : '' }} @endif>3</option>
                <option value="4" @if($vehicle->axles){{ $vehicle->axles == '4' ? "selected" : '' }} @endif>4</option>
                <option value="5" @if($vehicle->axles){{ $vehicle->axles == '5' ? "selected" : '' }} @endif>5</option>
                <option value="6" @if($vehicle->axles){{ $vehicle->axles == '6' ? "selected" : '' }} @endif>6</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <label for="sale_price"><h5>{{ __('custom.price.sale_price') }}</h5></label>
            <input type="text" class="form-control" name="sale_price" id="sale_price" value="{{$vehicle->sale_price}}" {{ $status ?? 'disabled' }}>
        </div>
        <div class="col-md-6">
            <label for="rent_price"><h5>{{ __('custom.price.rent_price') }}</h5></label>
            <input type="text" class="form-control" name="rent_price" id="rent_price" value="{{$vehicle->rent_price}}" {{ $status ?? 'disabled' }}>
        </div>
    </div>
    @if (Route::is('vehicles.edit'))
        @include('vehicles.parts.editAxles')
        @include('vehicles.parts.tank-trailer-form')
    @endif
    @guest
    <div class="form-row my-4">
        <div class="col">
            <label for="description"><h5>Description</h5></label>
            <textarea class="form-control" rows='3' name="description" id="description" readonly>{{ $vehicle->description }}</textarea>
        </div>
    </div>
    <div class="form-row my-4">
        <div class="col-6">
            <a class="btn btn-primary btn-lg btn-block" type="button" id="rent" href={{ route('rent.create',$vehicle) }}>RENT</a>
        </div>
        <!--div class="col">
            <input class="btn btn-primary btn-lg btn-block" type="submit" id="save" value="Save">
        </div-->
    </div>
    @endguest
    @auth
    <div class="form-row my-4">
        <div class="col">
            <a class="btn btn-primary btn-lg btn-block" type="button" id="edit" onclick="history.back()">Back</a>
        </div>
        <div class="col">
            <input class="btn btn-primary btn-lg btn-block" type="submit" id="update" value="Update">
        </div>
        <div class="col">
            <a class="btn btn-primary btn-lg btn-block" type="button" href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" target="_blank">View PDF</a>
        </div>
    </div>
    @endauth
</form>
<script>
    $('#tankTrailer').attr('hidden',false);

    function disableEdit(){
        document.getElementById('edit').disabled=true;
    };
</script>
