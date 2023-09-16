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
                        <a href="{{ "movies/".$movie['movieId'] }}" class="card-movie">
                            <figure class="mb-2">
                                <p><span class="icon-star"></span>{{ $movie['moviePoints'] }}</p>
                                <img src="{{ $movie['movieImage'] }}" alt="">
                            </figure>
                            <div class="px-3 py-1 pb-3 d-flex flex-column">
                                {{-- * TITULO PELICULA --}}
                                {{-- <h6>Ant Man and the Whasp: Quantunmania</h6> --}}
                                @if ($movie['usernameComment'] && $movie['comment'])
                                    <p class="title-comment">{{ "@".$movie['usernameComment']  }} </p>
                                    <p class="comment">{{ $movie['comment'] }}</p>
                                @else
                                    <p class="title-comment"> Actualmente no hay comentarios disponibles para esta película </p>
                                @endif
                            </div>
                        </a>
                    @endforeach
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
