@extends('layouts.home')

@section('title', 'Sign up')
@section('link-css', '/assets/css/auth/authenticated.css')

@section('content')
    <article class="card-authenticated w-25">
        <h4>Sign up</h4>
        <form action="/register" method="POST" class="mt-3 d-flex flex-column">
            {{-- TODO METODO DE SEGURIDAD PARA QUE LARAVEL ENVIE LA INFORMACION --}}
            @csrf

            {{-- TODO USERNAME --}}
            <label for="username" class="mb-1">Type your username</label>
            <input type="text" id="username" name="username" class="form-group mb-3" placeholder="Username">

            {{-- TODO EMAIL --}}
            <label for="email" class="mb-1">Type your Email</label>
            <input type="email" id="email" name="email" class="form-group mb-3" placeholder="Email">

            {{-- TODO PASSWORD --}}
            <label for="password" class="mb-1">Type your Password</label>
            <input type="password" id="password" name="password" class="form-group mb-3" placeholder="Password">

            {{-- TODO CONFIRM PASSWORD --}}
            <label for="password-confirmation" class="mb-1">Please Confirm your Password</label>
            <input type="password" id="password-confirmation" name="password_confirmation" class="form-group mb-4" placeholder="Confirm your password">

            {{-- TODO OPTIONS CONTAINER --}}
            <div class="d-flex justify-content-between align-items-center">
                <aside class="col-6 d-flex flex-column">
                    <a href="/login" class="mb-1 ps-1">Sign in</a>
                </aside>
                <button type="submit" class="col-3 register">Sign up</button>
            </div>
        </form>
    </article>
@endsection

