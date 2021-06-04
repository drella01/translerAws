@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-custom">
        <span class="item text-white">you are here:&nbsp;&nbsp;&nbsp;</span>
        <li class="breadcrumb-item"><a href="{{route('type.index')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('vehicles.index',$vehicle->type->name)}}">{{ ucfirst($vehicle->type->name) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $vehicle->registration.''.$vehicle->brand }}</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-6">
            <hr>
            <div class="row">
                <div class="col-6">
                    <h2 class="px-2" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{ $vehicle->brand }}</h2>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">View PDF</a>
                </div>
            </div>
            <h3 class="px-2" style="font-family: Open Sans, sans-serif;font-size:20px; font-weight:bold;">{{ $vehicle->model }}</h3>
            <hr>
        </div>
        <div class="col-4">
            <div class="intro">
                <h2 class="text-center" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{__('custom.gallery')}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row text-center">
                <div class="col-lg-12 bg-custom text-white">
                    <h5>{{ __('custom.general_data') }}</h5>
                </div>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>{{ __('custom.details.registration') }}</th>
                    <td>{{$vehicle->registration}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.details.brand') }}</th>
                    <td>{{$vehicle->brand}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.details.model') }}</th>
                    <td>{{$vehicle->model}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.price.sale_price') }}</th>
                    <td><h4>{{ $vehicle->sale_price.'€'}}</h4></td>
                </tr>
            </table>
            <div class="col-12">
                <div class="row my-4 text-center">
                    <div class="col-lg-12 bg-custom text-white">
                        <h5>{{ __('custom.axles_detail') }}</h5>
                    </div>
                </div>
            </div>
            @include('vehicles.parts.showAxles')
            <div class="col-12">
                <div class="row my-4 text-center">
                    <div class="col-lg-12 bg-custom text-white">
                        <h5>{{ __('custom.tank-trailer') }}</h5>
                    </div>
                </div>
            </div>
            @include('vehicles.parts.showTank')
        </div>
        <div class="col-4">
            <div id="carouselPhotosControl" class="carousel slide mb-4" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($photos as $photo)
                    <div class="carousel-item">
                        <img src="{{ url($photo) }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselPhotosControl" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselPhotosControl" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            @include('vehicles.parts.epicgallery')
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-6">
            <a href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" class="btn btn-primary btn-block" target="_blank" rel="noopener noreferrer">View PDF</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('vehicles.edit',$vehicle) }}" class="btn btn-primary btn-block" rel="noopener noreferrer">Edit vehicle</a>
        </div>
    </div>
</div>
@endsection
