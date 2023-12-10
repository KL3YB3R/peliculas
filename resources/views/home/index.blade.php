@extends('layouts.home')


@section('content')

    <section class="main-card-content">
        {{-- ! CAMPO DE BUSQUEDA --}}

        {{-- ! MOVIES SECTION --}}
        <article class="d-flex justify-content-between">
            {{-- TODO ULTIMOS VOTADOS --}}
            <div class="col-9 last-comment">
                <h4>Ultimas Peliculas puntuadas</h4>

                {{-- ? CONTENEDOR DE PELICULAS --}}
                @if ($bestDotted === null)
                    <div class="movies-container">
                        <h5 class="text-center">No hay películas comentadas</h5>
                @else
                    <div class="mt-5 movies-container">
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
                @endif
                    </div>
            </div>

            {{-- TODO MAS PUNTUADOS --}}
            <div class="col-3 best-pointer">
                <h4>Mejores puntuadas</h4>

                @if ($bestDotted === null)
                    <h5 class="text-center">No hay películas puntuadas</h5>
                @else
                    @foreach ($bestDotted as $movieDotted)
                        <a href="{{ "movies/".$movieDotted['movieId'] }}" class="card-movie d-flex justify-content-between">
                            <figure class="mb-2 col-3">
                                <img src="{{ $movieDotted['movieImage'] }}" alt="">
                            </figure>
                            <div class="col-9 d-flex flex-column align-items-start">
                                <p class="title-movie">{{ $movieDotted['movieName'] }}</p>
                                <p class="points-movie"><span class="icon-star"></span>{{ $movieDotted['moviePoints'] }} points</p>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </article>
    </section>
@endsection
