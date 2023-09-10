@extends('layouts.home')


@section('content')

    @foreach ($movies as $movie)
        <p>{{ $movie }}</p>
    @endforeach


    {{-- <h1>Home</h1>

    <a href="/logout">Logout</a> --}}
@endsection
