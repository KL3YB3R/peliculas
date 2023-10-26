@extends('layouts.home')

@section('title', 'Peliculas')
@section('link-css', '/assets/css/movies.css')

@section('content')
    <section class="movies-container">
        <h2>Explora y Comenta según tu criterio</h2>
        <aside class="movies-flex">
            @foreach ($movies as $movie)
                <a href="{{ "movies/".$movie['movieId'] }}">
                    <img src="{{ $movie['movieImage'] }}" alt="">
                    <div class="content-movie">
                        <p class="title-movie">{{ $movie['movieName'] }}</p>
                        <p class="description-movie">{{ $movie['movieCutDescription'] }}</p>
                    </div>
                    <p class="points-container"><span class="icon-star"></span>{{ $movie['moviePoints'] }}</p>
                </a>
            @endforeach
        </aside>
    </section>
@endsection
