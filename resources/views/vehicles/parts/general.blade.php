@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" method="get">
        @php
            $vh = new \App\Models\Vehicle;
            $listColumn = \Schema::getColumnListing($vh->getTable());
            $types = \App\Models\Type::all();
            $vehicle = $vh;
        @endphp
        <div class="form-row">
        @foreach ($listColumn as $item)
            @if ($item == 'created_at' ?: $item == 'updated_at' ?: $item == 'id')
            @elseif ($item == 'description')
                <textarea class="form-control col-sm-4" name={{$item}} placeholder="{{$item}}" rows="3"></textarea>
            @elseif ($item == 'type_id')
                <select name="{{$item}}" id="type" class="form-control col-sm-2" onchange="isTank()">
                    <option value="">{{ __('custom.selectType') }}</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ __('custom.'.$type->name) }}</option>
                    @endforeach
                </select>
            @elseif ($item == 'axles')
                <select class="form-control col-sm-2" id="axles" name="axles" onchange="ejes()">
                    <option value="">Select....</option>
                    <option value="1" @if($vehicle->axles){{ $vehicle->axles == '1' ? "selected" : '' }} @endif>1</option>
                    <option value="2" @if($vehicle->axles){{ $vehicle->axles == '2' ? "selected" : '' }} @endif>2</option>
                    <option value="3" @if($vehicle->axles){{ $vehicle->axles == '3' ? "selected" : '' }} @endif>3</option>
                    <option value="4" @if($vehicle->axles){{ $vehicle->axles == '4' ? "selected" : '' }} @endif>4</option>
                    <option value="5" @if($vehicle->axles){{ $vehicle->axles == '5' ? "selected" : '' }} @endif>5</option>
                    <option value="6" @if($vehicle->axles){{ $vehicle->axles == '6' ? "selected" : '' }} @endif>6</option>
                </select>
            @else
                <input class="form-control col-sm-2" type="text" name="{{$item}}" placeholder="{{$item}}">
            @endif
        @endforeach
        </div>
        @include('vehicles.parts.tank-trailer-form')
    </form>
</div>
@endsection
