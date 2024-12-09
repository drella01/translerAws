@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-custom">
        <span class="item text-white">You are here:&nbsp;&nbsp;&nbsp;</span>
        <li class="breadcrumb-item"><a style="color: #ffffff" href="{{route('type.index')}}">Home</a></li>
        @if ($vehicle->type)
        <li class="breadcrumb-item"><a style="color: #ffffff" href="{{route('vehicles.index',$vehicle->type->name)}}">{{ ucfirst($vehicle->type->name) }}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{ $vehicle->reference }}</li>
    </ol>
</nav>
<div class="container">
    @if( session()->has('info') )
    <div class="alert alert-success" role="alert" style="text-align:center; font-family:arial; font-size:20px;">{{ session('info') }}</div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <hr>
            <div class="row">
                <div class="col-4">
                    <h2 class="px-2" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{ $vehicle->reference }}</h2>
                    <h4 class="px-2" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{ ucfirst($vehicle->brand) }}</h4>
                </div>
                <div class="col-8 text-right">
                    @if($vehicle->video_link)
                        <a href={{$vehicle->video_link}} target="_blank" class="btn btn-outline-info" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                            </svg>
                        </a>
                    @endif
                    <a href="https://wa.me/34670097722?text=Hola%20desde%20la%20web.%20Quiero%20informacion%20del%20vehiculo%20referencia%20{{$vehicle->reference}}" target="_blank" class="btn btn-outline-success" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg>
                    </a>
                    <a class="btn btn-outline-danger" type="button" href="{{ route('vehicles.pdf',$vehicle) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                            <path d="M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.6 11.6 0 0 0-1.997.406 11.3 11.3 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.244.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 5.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-6 text-center my-4">
            <div class="intro">
                <h2 class="text-center" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{__('custom.gallery')}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('vehicles.parts.showGeneral')
            @include('vehicles.parts.showChassis')
            @include('vehicles.parts.showAxles')
            @if ($vehicle->cab)
            @include('vehicles.parts.showCab')
            @endif
            @if ($vehicle->cargo_type == 'tank-trailer')
                @include('vehicles.parts.showTank')
            @elseif ($vehicle->cargo_type == 'trailer')
                @include('vehicles.parts.showContainer')
            @endif
        </div>
        <div class="col-md-6 text-center">
            @include('vehicles.parts.fancygallery')
        </div>
    </div>
    @auth
    <div class="row my-4">
        <!--div class="col">
            <a href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" class="btn btn-primary btn-block" target="_blank" rel="noopener noreferrer">Ver PDF</a>
        </div-->
        <div class="col">
            <a href="{{ route('photos.reorderAll',$vehicle) }}" class="btn btn-success btn-block" rel="noopener noreferrer">Editar fotos</a>
        </div>
        <div class="col">
            <a href="{{ route('vehicles.edit',$vehicle) }}" class="btn btn-primary btn-block" rel="noopener noreferrer">Editar datos</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-block" type="button" href="{{ route('vehicles.adminpdf',$vehicle) }}" target="_blank">Admin PDF</a>
        </div>
        <div class="col">
            @include('vehicles.parts.modal')
        </div>
    </div>
    @endauth
</div>
@endsection
