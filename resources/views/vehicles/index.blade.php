@extends('layouts.app')

@section('content')
    <div class="container">
        @if (!$type->vehicles()->count())
            <h1>{{ __('custom.qt.empty') }}</h1>
        @else
            <h1>{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h1>
        @endif
        <div class="row">
            @forelse ($vehicles as $vehicle)
                <div class="col-sm-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <a href="{{route('vehicles.show',$vehicle)}}">
                            <img src="{{ url($vehicle->photos()->first()->url) }}" class="img-fluid img-custom" alt="asd">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->brand.'-'.$vehicle->model }}</h5>
                            <h6 class="card-text">{{ $vehicle->registration }}</h6>
                            <h6 class="card-text">{{ $vehicle->reg_date }}</h6>
                            <br>
                            <h3 class="card-title">{{ $vehicle->sale_price }} {{ '€' }}</h3>
                        </div>
                    </div>
                </div>
            @empty
                <li>{{ __('custom.qt.empty') }}</li>
            @endforelse
        </div>
    </div>
@endsection
