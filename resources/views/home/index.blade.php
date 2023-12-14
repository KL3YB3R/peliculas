@extends('layouts.home')

@section('title', 'Novedades')
@section('content')

    <p id="page" class="d-none">novedades</p>

    <section class="main-card-content">
        {{-- ! CAMPO DE BUSQUEDA --}}

        {{-- ! MOVIES SECTION --}}
        <article class="d-flex justify-content-between">
            <div class="col-4">
                <h5>Mejores Puntuadas</h5>
                @if ($bestDotted === null)
                    @include('layouts.notInformation', ['section' => 'bestDotted'])
                @else
                    @include('layouts.bestDotted', [$bestDotted])
                @endif
            </div>
            <div class="col-8">
                <h4>Ultimas Comentadas</h4>
                @if ($latestComments === null)
                    @include('layouts.notInformation', ['section' => 'latestComments'])
                @else
                    @include('layouts.lastestComments', [$latestComments])
                @endif
            </div>
        </article>
    </section>
@endsection
