@extends('layouts.app')

@section('content')
<div class="container">
    @if( session()->has('info') )
        <h3>{{ session('info') }}</h3>
    @endif
    <p><h2 class="text-center bg-filter text-white">Alta de nuevo vehículo</h2></p>
    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row my-4 text-center">
            <div class="col-sm-12 bg-custom text-white">
                <h5>{{ __('custom.general_data') }}</h5>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="registration">Registration</label>
                <input name="registration" type="text" class="form-control" id="registration">
                {!! $errors->first('registration', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-sm-3">
                <label for="type">Type</label>
                <select name="type_id" id="type" class="form-control" onchange="isTank()">
                    <option value="">{{ __('custom.selectType') }}</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ __('custom.'.$type->name) }}</option>
                    @endforeach
                </select>
                {!! $errors->first('type_id', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-sm-3">
                <label for="brand">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">{{ __('custom.selectBrand') }}</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('brand', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-sm-3">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control" id="model" placeholder="Model">
                {!! $errors->first('model', '<span class=error>:message</span>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="chassis">Bastidor</label>
                <input name="chassis" type="text" class="form-control" id="chassis">
                {!! $errors->first('kms', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-sm-3">
                <label for="kms">Kms</label>
                <input name="kms" type="text" class="form-control" id="kms">
                {!! $errors->first('kms', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-sm-2">
                <label for="axles">{{ __('custom.axles') }}</label>
                <select class="form-control" id="axles" name="axles">
                    <option value="">{{ __('custom.axles') }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>
        @include('vehicles.parts.axles')
        @include('vehicles.parts.tank-trailer-form')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sale_price">sale price</label>
                <input name='sale_price' type="text" class="form-control" id="sale_price" value="{{ $vehicle->sale_price ?? old('sale_price') }}" placeholder="sale price">
                {!! $errors->first('sale_price', '<span class=error>:message</span>') !!}
                @error('sale_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="rent_price">rent price</label>
                <input name="rent_price" type="text" class="form-control" id="rent_price" placeholder="rent price">
                {!! $errors->first('rent_price', '<span class=alert-danger>:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example photo input</label>
            <input type="file" class="form-control-file" name="photo[]" accept="image/*" multiple>
            {!! $errors->first('photo[]', '<span class=alert-danger>:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example doc input</label>
            <input type="file" class="form-control-file" name="document[]" multiple>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script-->
@endsection
