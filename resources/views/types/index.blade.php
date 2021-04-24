@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-2 bg-secondary px-2"></div>
    <div class="col-md-10 px-2">
        <div class="row">
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
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-12 text-center bg-secondary text-white">
                        {{__('custom.stockNew')}}
                    </div>
                    @foreach ($lastVehicles as $item)
                        <div class="col-sm-6 bg-secondary text-white py-2">
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
                <div class="embed-responsive embed-responsive-1by1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@endsection
