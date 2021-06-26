<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        @foreach (\Schema::getColumnListing(\App\Models\Vehicle::first()->getTable()) as $item)
        @if ($item == 'created_at' ?: $item == 'updated_at')
        @else
            <input class="text" name="{{$item}}" placeholder="{{$item}}">
        @endif
        @endforeach
    </form>
</body>
</html>
