@extends('layouts.home')


@section('content')

    <section class="main-card-content">
        {{-- ! CAMPO DE BUSQUEDA --}}

        {{-- ! MOVIES SECTION --}}
        <article class="d-flex justify-content-between">
            {{-- TODO ULTIMOS VOTADOS --}}
            <div class="col-8 last-comment">
                <h4>Ultimas Peliculas puntuadas</h4>

                {{-- ? CONTENEDOR DE PELICULAS --}}
                <div class="mt-5 movies-container">
                    @foreach ($movies as $movie)
                        <article class="card-movie d-flex flex-column justify-content-start">
                            <a href="{{ "movies/".$movie['movieId'] }}" class="movie-details">
                                <img src="{{ $movie['movieImage'] }}" alt="">
                                <div class="content-movie">
                                    <p class="title-movie">{{ $movie['movieName'] }}</p>
                                    <p class="description-movie">{{ $movie['movieCutDescription'] }}</p>
                                </div>
                                <p class="points-container"><span class="icon-star"></span>{{ $movie['moviePoints'] }}</p>
                            </a>
                            <aside class="comment-details">
                                {{-- * TITULO PELICULA --}}
                                {{-- <h6>Ant Man and the Whasp: Quantunmania</h6> --}}
                                @if ($movie['usernameComment'] && $movie['comment'])
                                    <p class="title-comment">{{ "@".$movie['usernameComment']  }} </p>
                                    <p class="comment">{{ $movie['cutComment'] }}</p>
                                @else
                                    <p class="title-comment"> Actualmente no hay comentarios disponibles para esta película </p>
                                @endif
                            </aside>
                        </article>
                    @endforeach

                    {{-- <article href="{{ "movies/".$movie['movieId'] }}" class="card-movie">
                            <a href="#" class="mb-2">
                                <figure>
                                    <img src="{{ $movie['movieImage'] }}" alt="">
                                </figure>
                                <p><span class="icon-star"></span>{{ $movie['moviePoints'] }}</p>
                            </a>
                            <div class="px-3 py-1 pb-3 d-flex flex-column">
                                {{-- * TITULO PELICULA --}}
                                {{-- <h6>Ant Man and the Whasp: Quantunmania</h6>
                                @if ($movie['usernameComment'] && $movie['comment'])
                                    <p class="title-comment">{{ "@".$movie['usernameComment']  }} </p>
                                    <p class="comment">{{ $movie['comment'] }}</p>
                                @else
                                    <p class="title-comment"> Actualmente no hay comentarios disponibles para esta película </p>
                                @endif
                            </div>
                        </article> --}}
                </div>
            </div>

            {{-- TODO MAS PUNTUADOS --}}
            <div class="col-3 best-pointer">
                <h4>Mejores puntuadas</h4>

                @foreach ($movies as $movie)
                    <a href="{{ "movies/".$movie['movieId'] }}" class="card-movie d-flex justify-content-between">
                        <figure class="mb-2 col-3">
                            <img src="{{ $movie['movieImage'] }}" alt="">
                        </figure>
                        <div class="col-9 d-flex flex-column align-items-start">
                            <p class="title-movie">{{ $movie['movieName'] }}</p>
                            <p class="points-movie"><span class="icon-star"></span>{{ $movie['moviePoints'] }} points</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </article>
    </section>
    {{-- @foreach ($movies as $movie)
        <p>{{ $movie }}</p>
    @endforeach --}}


    {{-- <h1>Home</h1>

    <a href="/logout">Logout</a> --}}
@endsection
