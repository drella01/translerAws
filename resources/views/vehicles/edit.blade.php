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
</div>
<script>
    function disableEdit(){
        var edit = document.getElementById('edit');
        edit.disabled=true;
    }
</script>
@endsection
