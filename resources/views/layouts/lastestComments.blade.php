<article class="mt-4 movies-container lastest-movies-container">
    @foreach ($latestComments as $lastMovie)
        <article class="card-movie d-flex flex-column justify-content-start">
            <a href="{{ "movies/".$lastMovie['movieId'] }}" class="movie-details">
                <img src="{{ $lastMovie['movieImage'] }}" alt="">
                <div class="content-movie">
                    <p class="title-movie">{{ $lastMovie['movieName'] }}</p>
                    <p class="description-movie">{{ $lastMovie['movieCutDescription'] }}</p>
                </div>
                <p class="points-container"><span class="icon-star"></span>{{ $lastMovie['moviePoints'] }}</p>
            </a>
            <aside class="comment-details">
                {{-- * TITULO PELICULA --}}
                {{-- <h6>Ant Man and the Whasp: Quantunmania</h6> --}}
                @if ($lastMovie['usernameComment'] && $lastMovie['cutComment'] !== '')
                    <p class="title-comment">{{ "@".$lastMovie['usernameComment']  }} </p>
                    <p class="comment">{{ $lastMovie['cutComment'] }}</p>
                @else
                    <p class="title-comment"> Actualmente no hay comentarios disponibles para esta película </p>
                @endif
            </aside>
        </article>
    @endforeach
</article>
