
@extends('layouts.auth')
<head>
    <title>Sign in</title>
</head>

@section('content')
    <h4>Sign in</h4>
    <form action="/login" method="POST" class="mt-3 d-flex flex-column">
        {{-- TODO METODO DE SEGURIDAD PARA QUE LARAVEL ENVIE LA INFORMACION --}}
        @csrf

        {{-- TODO USERNAME --}}
        <label for="username" class="mb-1">Username or Email</label>
        <input type="text" name="username" id="username" class="form-group mb-3" placeholder="Type your username or email">

        {{-- TODO PASSWORD --}}
        <label for="password" class="mb-1">Password</label>
        <input type="password" name="password" id="password" class="form-group mb-4" placeholder="Type your password">

        {{-- TODO OPTIONS CONTAINER --}}
        <div class="d-flex justify-content-between align-items-end">
            <aside class="col-6 d-flex flex-column">
                <a href="/register" class="mb-1 ps-1">Sign up</a>
                <a href="#" class="ps-1">I forgot password</a>
            </aside>
            <button type="submit" class="col-3 login">Sign in</button>
        </div>
    </form>
@endsection
