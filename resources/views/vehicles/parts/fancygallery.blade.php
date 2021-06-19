<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}">
</head>
<body>
    <h2>{{__('custom.gallery')}}</h2>
    <hr class="my-2" />
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-sm-3">
            <a href="{{ url($photo) }}" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                <img src="{{ url($photo) }}" style="width: 80px; height: auto;"/>
            </a>
        </div>
        @endforeach
    </div>
	<!-- JS -->
	<!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
	<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
</body>
</html>
