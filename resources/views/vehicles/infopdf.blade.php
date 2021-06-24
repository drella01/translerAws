<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            font-size: 12px;
            height: 100vh;
            margin: 20px;
        }
        .square {
            border-radius: 25px;
            background: #d3d3d3;
            width: 80px;
            height: 80px;
            border:3px #ffff00;
            text-align: center;
        }
        .isdir {
            transform: rotate(10deg);
        }

        .img-custom {
            width: 300px; /* You can set the dimensions to whatever you want */
            height: 300px;
            object-fit: cover;
        }
        .btn-nav{
            width: 120px;
            height: 80px;
            padding: 8px;
            background-color: #ffffff;
            text-decoration:none !important;
            display: inline-block;
        }
        a h6{
            padding-top: 1px;
            text-align: center;
            font-weight: bolder;
            font-size: 10px;
        }
        a img{
            padding-top: 1px;
            height: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .bg-custom{
            background-image: linear-gradient(to bottom right, #00b7ff, #ffff00);
        }

        .bg-filter{
            background-image: linear-gradient(to bottom right, #3c7388, #8c8c8f);
        }

        .linea {
            border-top: 1px solid black;
            height: 2px;
            max-width: 200px;
            padding: 0;
            margin: 20px auto 0 auto;
        }
        .bg-custom{
            background-image: linear-gradient(to bottom right, #00b7ff, #ffff00);
        }

        .bg-filter{
            background-image: linear-gradient(to bottom right, #3c7388, #8c8c8f);
        }
        div.d-flex>hr {
            height: 4px;
            width: 100%;
            background-color: #d3d3d3;
            padding: 0;
            margin: 30px auto 0 auto;
        }
        .square {
            border-radius: 25px;
            background: #d3d3d3;
            width: 80px;
            height: 80px;
            border:3px #ffff00;
            text-align: center;
        }

        .isdir {
            transform: rotate(10deg);
        }

        .linea {
            border-top: 1px solid black;
            height: 2px;
            max-width: 200px;
            padding: 0;
            margin: 20px auto 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <img src="{{ public_path('storage/transler.jpg') }}" style="max-width: 100%" alt="Logo">
            </nav>
        </header>
        <div class="row">
            <div class="col-md-6">
                <div class="row my-4 text-center">
                    <div class="col-lg-12">
                        <h5>{{ __('custom.general_data') }}</h5>
                    </div>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>{{ __('custom.details.registration') }}</th>
                        <td> {{ $vehicle->registration }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('custom.details.brand') }}</th>
                        <td> {{ $vehicle->brand }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('custom.details.model') }}</th>
                        <td> {{ $vehicle->model }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12">
            <div class="row my-4 text-center">
                <div class="col-lg-12">
                    <h5>{{ __('custom.tank-trailer') }}</h5>
                </div>
            </div>
        </div>
        @include('vehicles.parts.showTank')
        @foreach ($vehicle->axlesDetail as $key=>$item)
            <div class="row my-4 text-center">
                <div class="col-lg-12">
                    <h5>{{ __('custom.axle').' '.++$key }}</h5>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <th>{{ __('custom.axles.isDir') }}</th>
                        <td>
                        @if ($item->isDir)
                            Yes
                        @else
                            No
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('custom.axles.isDouble') }}
                        </th>
                        <td>
                            @if ($item->isDouble)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('custom.axles.brake') }}
                        </th>
                        <td>
                            {{$item->brake}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('custom.axles.suspension') }}
                        </th>
                        <td>
                            {{$item->suspension}}
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
            <div class="col-8">
                <p class="text-center mt-2"><h2 style="color: #778899">FOTOS</h2></p>
            @foreach ($vehicle->photos()->pluck('url') as $photo)
                <img class="img-fluid" src="{{ public_path(str_replace('photos','mini',$photo)) }}" style="width: 80px; height:auto">
            @endforeach
            </div>
    </div>
</body>
</html>
