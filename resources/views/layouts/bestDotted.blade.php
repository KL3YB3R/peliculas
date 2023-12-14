<article class="w-100 best-dotted-container">
    @foreach ($bestDotted as $movieDotted)
        <a href="{{ "movies/".$movieDotted['movieId'] }}" class="card-movie d-flex justify-content-between">
            <img src="{{ $movieDotted['movieImage'] }}" alt="">
            <p class="points-movie"><span class="icon-star"></span>{{ $movieDotted['moviePoints'] }}</p>
            {{-- <div class="col-9 d-flex flex-column align-items-start">
                <p class="title-movie">{{ $movieDotted['movieName'] }}</p>
            </div> --}}
        </a>
    @endforeach
</article>
