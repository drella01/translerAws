
<div class="container">
    <h2 style="text-align:center">Lightbox</h2>

    <!--div class="row">
        <div class="column">
            <img src="{{ asset('storage/img1.jpg') }}" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
        </div>
        <div class="column">
            <img src="{{ asset('storage/img2.jpg') }}" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
        </div>
        <div class="column">
            <img src="{{ asset('storage/img3.jpg') }}" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
        </div>
        <div class="column">
            <img src="{{ asset('storage/img4.jpg') }}" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
        </div>
    </div-->
    <div class="row py-2">
        @foreach ($photos as $photo)
            <div class="column">
                <img src="{{ url($photo) }}" style="width:100%" onclick="openModal();currentSlide()" class="hover-shadow cursor">
            </div>
        @endforeach
    </div>

    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="modal-content">
            @foreach ($photos as $photo)
            <div class="mySlides">
                <div class="numbertext">4 / {{ $i.' / '.$j }}</div>
                <img src="{{ url($photo) }}" style="width:100%">
            </div>
            @endforeach


            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row py-2">
                @foreach ($photos as $photo)
                <div class="column">
                    <img class="demo cursor" src="{{ url($photo)}}" style="width:100%" onclick="currentSlide({{ $i+=1 }})" alt="Northern Lights">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
