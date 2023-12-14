@extends('layouts.home')
{{-- * LINK CSS --}}
@section('link-css', '/assets/css/user/movie-details.css')

{{-- * CONTENIDO DE LA PAGINA --}}
@section('content')

    <section class="movie-container">
        <a href="#" onclick="window.history.back();" class="back-button">Volver</a>
        {{-- ! HEADER DE LA PELICULA --}}
        <header class="d-flex justify-content-start align-items-end">
            <h1>{{ $movie->name }}</h1>
            {{-- <h5><span class="icon-star"></span>4.7 points</h5> --}}
        </header>


        <div class="details-container d-flex justify-content-center align-items-start">
            <aside class="col-2">
                <img src="{{ $movie->image }}" alt="">

                <h6>Valoración</h6>
                <p class="points-container d-flex align-items-center"><span class="icon-star"></span>{{ $movie->movie_points }} puntos</p>
            </aside>
            <aside class="col-8">
                <h6>Descripción</h6>
                <p>{{ $movie->description }}</p>

                <h6 class="mt-5 d-flex justify-content-between align-content-center">
                    Comentarios
                    @if ($user)
                        <a href="#" class="button-comment" data-toggle="modal" data-target="#modal-comment">Comentar</a>
                    @endif
                </h6>
                <div class="contenedor-comentarios">
                    @foreach ($comments as $comment)
                        <article class="d-flex justify-content-start align-items-start">
                            <figure class="col-1 mb-0">
                                <img src="{{ $comment->image }}" alt="">
                            </figure>
                            <div class="col-11">
                                <p class="username-comment d-flex justify-content-between align-content-center">
                                    {{ "@".$comment->username }}
                                    <span>{{ $comment->comment_points }} points</span>
                                </p>
                                <p class="comment">{{ $comment->comment }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

            </aside>
            <aside class="col-2">
                <h6>Se estrenó el:</h6>
                <p class="mb-4">{{ $datePublished }}</p>

                <h6>Géneros</h6>
                <p>{{ $movie->genders }}</p>
            </aside>
        </div>
    </section>

    {{-- ! MODAL COMMENT --}}
    <div class="modal modal-comentario fade" id="modal-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{ "comment/".$movie->id }}" method="POST">
                @csrf
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title" id="exampleModalLabel">Haz tu comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <textarea name="comment" id="comment" rows="5" class="modal-comment"></textarea>
                    <aside class="d-flex flex-column">
                        <label for="points">Califica esta película (max. 5)</label>
                        <input type="text" id="comment_points" name="comment_points" placeholder="2.5, 2 o 1.1">
                    </aside>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </div>
            </form>
        </div>
    </div>



@endsection
