@extends('layouts.home')

@section('title', 'Peliculas')
@section('link-css', '/assets/css/movies.css')

@section('content')
    <p id="page" class="d-none">películas</p>

    <section class="movies-container">
        {{-- <h5></h5> --}}
        @foreach ($allMovies as $movie)
            <article class="card-movie d-flex flex-column justify-content-start">
                <a href="{{ "movies/".$movie['id'] }}" class="movie-details">
                    <img src="{{ $movie['image'] }}" alt="">
                    <div class="content-movie">
                        <p class="title-movie">{{ $movie['name'] }}</p>
                        <p class="description-movie">{{ $movie['description'] }}</p>
                    </div>
                    <p class="points-container"><span class="icon-star"></span>{{ $movie['points'] }}</p>
                </a>
            </article>
        @endforeach
    </section>
@endsection
