@extends('layouts.app')

@section('content')
<nav class="bg-custom" aria-label="breadcrumb">
    <ol class="breadcrumb bg-custom">
        <li class="breadcrumb-item"><a href="{{route('type.index')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($type->name) }}</li>
    </ol>
</nav>
    <div class="container py-4">
        @if (!$type->vehicles()->count())
            <h1>{{ __('custom.qt.empty') }}</h1>
        @else
            <h1>{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h1>
        @endif
        <div class="row">
            <div class="col-sm-2">
                @include('types.parts.filter')
            </div>
            @forelse ($vehicles as $vehicle)
                <div class="col-sm-4 mb-4" id="{{ $vehicle->id }}">
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

            @forelse ($vehicles->sortBy('sale_price') as $vehicle)
                <div class="col-sm-4 mb-4 prueba" id="{{ $vehicle->id }}" hidden>
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
