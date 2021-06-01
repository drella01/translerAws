@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $vehicle->registration }}</h1>
    @if( session()->has('info') )
    <div class="alert alert-success" role="alert" style="text-align:center; font-family:arial; font-size:20px;">{{ session('info') }}</div>
    @endif
    @include('vehicles.info',[
        'edit' => 'form',
        'status' => 'enable'
    ])
</div>
<script>
    var axles = {!! json_encode($vehicle->axlesDetail) !!}
    axles.forEach(item => {
        //$('#axlesDetail').append(`<div class="container form-row"><h1>${item.brake}</h1></div>`)
    });


    function disableEdit(){
        var edit = document.getElementById('edit');
        edit.disabled=true;
    }
</script>
@endsection
