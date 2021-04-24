<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Grupo Carrasco') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

     <!-- jQuery & select2 Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="col-md-6">
                <img src="{{ asset('storage/logo-carrasco.jpg') }}" style="width: 100%" alt="Logo">
            </div>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownVehicles" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>Admin</span><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownVehicles">
                                <a href="{{ route('vehicles.create') }}" class="dropdown-item">New Vehicle</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownRentVehicles" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>RENTING</span><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownRentVehicles">
                                <a href="{{ route('rent.index') }}" class="dropdown-item">Rent Vehicle</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownLanguage" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>Language</span><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguage">
                                <a href="{{ url('locale/en') }}" class="dropdown-item">
                                    <span class="caret"><img src="{{ asset('storage/flags/en.png') }}" alt="Logo"></span>
                                </a>
                                <a href="{{ url('locale/es') }}" class="dropdown-item">
                                    <span><img src="{{ asset('storage/flags/es.png') }}" alt="Logo"></span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="nav nav-tabs bg-white">
            <li class="nav-item">
                <a class="btn btn-outline-primary" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a href="" class="btn btn-outline-primary">About us</a>
            </li>
            <li class="nav-item">
                <a href="" class="btn btn-outline-primary">Contact</a>
            </li>
        </ul>
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="flex-lg-row clearfix">
                @foreach (\App\Models\Type::all() as $type)
                <a class="d-inline-block nav-link btn-nav" href="{{route('vehicles.index',$type->name)}}">
                    <h6>{{ __('custom.'.$type->name)}}</h6>
                    <div><img src="{{ asset('storage/'.$type->name.'.png') }}" alt="{{$type->name}}"></div>
                    @if ($type->vehicles()->count())
                    <div class="pt-2"><h6 class="card-text">{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h6></div>
                    @else
                    <div class="pt-2"><h6 class="card-text">{{ __('custom.qt.empty') }}</h6></div>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="footer bg-secondary text-white p-4">
        <div class="row">
            <div class="col-sm-3">
                <h2 class="font-weight-bold card-title">Grupo Carrasco</h2>
                <p class="mb-0">Poligono Industrial LAS CASAS C/D, Parcela 12</p>
                <p class="mb-0">42005 SORIA ‐ ESPAÑA</p>
                <p class="mb-0">Tf: +34975232203</p>
                <h6>email: info@rodatamcarrasco.com</h6>
            </div>
        </div>
        <div class="text-white text-center">
            <a class="text-white mx-2" style="text-decoration: none" href="mailto:info@rodatamcarrasco.com ">contact us</a>
            <a class="text-white mx-2" style="text-decoration: none" href="https://www.w3schools.com" target="_blank">legal warning</a>
            <span>Powered by soriaXXI</span>
        </div>
    </div>
</body>
</html>
