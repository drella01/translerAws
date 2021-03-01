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
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ public_path('storage/logo-carrasco.jpg') }}" alt="Logo">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2>{{$vehicle->registration}}</h2>
        <h4>{{$vehicle->brand}}</h4>
        <h4>{{$vehicle->model}}</h4>
        @if ($vehicle->photos()->first())
            <img src="{{ $vehicle->photos()->first()->url }}" class="img-fluid img-thumbnail" alt="NO PHOTO">
        @else
            <h2>no photos</h2>
        @endif
    </div>
</body>
</html>
