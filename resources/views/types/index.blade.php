@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="typeCarousel">
                <div class="carousel-inner">
                    @foreach ($types as $type)
                    <div class="carousel-item">
                        <img src="storage/{{$type->name}}.jpg" class="d-block w-100 img-fluid img-custom" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ trans('custom.'.$type->name) }}</h5>
                            <h6 class="card-text">{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#typeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#typeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4 bg-filter">
            <div class="row">
                <div class="col-md-12 text-center bg-filter text-white">
                    {{__('custom.stockNew')}}
                </div>
                @foreach ($lastVehicles as $item)
                    <div class="col-sm-6 text-white py-2">
                        @if ($item->photos()->count())
                        <img class="d-block w-100" src="{{$item->photos()->first()->url}}" alt="Card image cap">
                        @else
                        <img class="card-img-top" src="{{ App\Models\Vehicle::first()->photos()->first()->url}}" alt="Card image cap">
                        @endif
                        <a href="{{ route('vehicles.show',$item->id)}}">
                            <div class="card-body">
                                <p class="card-text">{{$item->brand}}-{{$item->model}}</p>
                                <h6>Price: {{$item->sale_price}}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-4">
            <!--div class="embed-responsive embed-responsive-1by1">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
            </div-->
            <video width="400" height="auto" controls>
                <source src="{{ asset('storage/videos/video camion.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>
</div>
@endsection
