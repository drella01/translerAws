@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $vehicle->registration }}</h1>
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
            @include('vehicles.parts.epicgallery')
        </div>
        <div class="col-4">
            <div class="justify-text-center">
                <h3>{{ __('custom.description') }}</h3>
            </div>
            <ul class="list-group-flush list-unstyled table-striped">
                <li class="list-group-item">{{ __('custom.details.registration').': '.$vehicle->registration }}</li>
                <li class="list-group-item">{{ __('custom.details.brand').': '.$vehicle->brand }}</li>
                <li class="list-group-item">{{ __('custom.details.model').': '.$vehicle->model }}</li>
                <li class="list-group-item">{{ __('custom.details.reg_date').': '.$vehicle->reg_date }}</li>
                <li class="list-group-item" class="mt-4">
                    <h4>{{ __('custom.price.sale_price').': '.$vehicle->sale_price.'€'}}</h4>
                </li>
            </ul>
            <h4><hr></h4>
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
            <a href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">View PDF</a>
            <a href="{{ route('vehicles.edit',$vehicle) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Edit vehicle</a>
        </div>
    </div>
</div>
@endsection
