<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name','Grupo Carrasco') }}</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/custom.js') }}" defer></script>
     <script src="{{ asset('js/custom-lightbox.js') }}" defer></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom-lightbox.css') }}" rel="stylesheet">

 <!-- Bootstrap Scripts -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- Images used to open the lightbox -->
        <div class="row">
            <div class="column">
                <img src="storage/img1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow">
            </div>
            <div class="column">
                <img src="storage/img2.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow">
            </div>
            <div class="column">
                <img src="storage/img3.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
            <div class="column">
                <img src="storage/img4.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow">
            </div>
        </div>

        <!-- The Modal/Lightbox -->
        <div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">

                <div class="mySlides">
                    <div class="numbertext">1 / 4</div>
                    <img src="storage/img1.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 4</div>
                    <img src="storage/img2.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 4</div>
                    <img src="storage/img3.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 4</div>
                    <img src="storage/img4.jpg" style="width:100%">
                </div>

                <!-- Next/previous controls -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Caption text -->
                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <!-- Thumbnail image controls -->
                <div class="column">
                    <img class="demo" src="storage/img1.jpg" onclick="currentSlide(1)" alt="Nature">
                </div>

                <div class="column">
                    <img class="demo" src="storage/img2.jpg" onclick="currentSlide(2)" alt="Snow">
                </div>

                <div class="column">
                    <img class="demo" src="storage/img3.jpg" onclick="currentSlide(3)" alt="Mountains">
                </div>

                <div class="column">
                    <img class="demo" src="storage/img4.jpg" onclick="currentSlide(4)" alt="Lights">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
