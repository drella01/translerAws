@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>{{ $vehicle->registration }}</h1>
        </div>
        <div class="col-4">
            <div class="intro">
                <h2 class="text-center">{{__('custom.gallery')}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div id="carouselPhotosControl" class="carousel slide" data-ride="carousel">
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
            <div class="row my-4 text-center">
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
        </div>
        <div class="col-4">
            @include('vehicles.parts.epicgallery')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row my-4 text-center">
                <div class="col-lg-12 bg-custom text-white">
                    <h5>{{ __('custom.tank-trailer') }}</h5>
                </div>
            </div>
        </div>
        @include('vehicles.parts.showTank')
        <a href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">View PDF</a>
        <a href="{{ route('vehicles.edit',$vehicle) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Edit vehicle</a>
    </div>
</div>
@endsection
