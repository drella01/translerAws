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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Registration</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Kms</th>
                        <th>Sale price</th>
                        <th>Rent price</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td scope="row">
                            <img src="{{ url($vehicle->photos()->first()->url) }}" class="img-fluid img-thumbnail" style="width:80px;" alt="na de na">
                        </td>
                        <td>
                            <a href="{{ route('vehicles.show',$vehicle->id) }}">{{ $vehicle->registration }}</a>
                        </td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->kms }}</td>
                        <td>{{ $vehicle->sale_price }}</td>
                        <td>{{ $vehicle->rent_price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
