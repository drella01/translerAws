<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <img src="{{ public_path('storage/transler.jpg') }}" style="max-width: 100%" alt="Logo">
            </nav>
        </header>
        <h2>{{$vehicle->registration}}</h2>
        <h4>{{$vehicle->brand}}</h4>
        <h4>{{$vehicle->model}}</h4>
        <div class="col-12">
            <div class="row my-4 text-center">
                <div class="col-lg-12">
                    <h5>{{ __('custom.tank-trailer') }}</h5>
                </div>
            </div>
        </div>
        @include('vehicles.parts.showTank')
    </div>
</body>
</html>
