@extends('layouts.app')

@section('content')
<div class="container">
    @if( session()->has('info') )
        <h3>{{ session('info') }}</h3>
    @endif
    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="registration">Registration</label>
                <input name="registration" type="text" class="form-control" id="registration">
                {!! $errors->first('registration', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-md-4">
                <label for="type">Type</label>
                <select name="type_id" id="type" class="form-control">
                    <option value="">{{ __('custom.selectType') }}</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ __('custom.'.$type->name) }}</option>
                    @endforeach
                </select>
                {!! $errors->first('type_id', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-md-2">
                <label for="kms">Kms</label>
                <input name="kms" type="text" class="form-control" id="kms">
                {!! $errors->first('kms', '<span class=error>:message</span>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="brand">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">{{ __('custom.selectBrand') }}</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('brand', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group col-md-6">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control" id="model" placeholder="Model">
                {!! $errors->first('model', '<span class=error>:message</span>') !!}
            </div>
        </div>
        @include('vehicles.parts.axles')
        <div class="form-check col-md-6">
            <label class="form-check-label" for="hasTank">
                <h2>Es o tiene cisterna?</h2>
            </label>
            <input name="hasTank" type="checkbox" class="form-control" id="hasTank" placeholder="hasTank" onchange="isTank()">
            {!! $errors->first('hasTank', '<span class=error>:message</span>') !!}
        </div>
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
@endsection
