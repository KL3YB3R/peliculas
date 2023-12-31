<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HeaderUserController;
use App\Http\Controllers\RegisterMoviesController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDetailsController;
use App\Http\Controllers\SaveCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// * MOSTRAR LA VISTA DE INICIO CON Y SIN LOGUEAR
Route::controller(HomeController::class)->group(function () {
    // TODO VISTA HOME
    Route::get('/', 'show');
    // TODO MOSTRAR VISTA HOME
    Route::get('/home', 'show');
});

// * MOSTRAR LAS PELICULAS EN EL HOME
Route::controller(MovieController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index');
    Route::get('/movies', 'showMovies');
});

// ! SIN LOGUEAR
// * REGISTER CONTROLLER
Route::controller(RegisterController::class)->group(function () {
    // TODO MOSTRAR LA VISTA REGISTER
    Route::get('/register', 'show');
    // TODO ENVIAR EL REGISTRO
    Route::post('/register', 'register');
});

// * lOGIN CONTROLLER
Route::controller(LoginController::class)->group(function () {
    // TODO MOSTRAR VISTA LOGIN
    Route::get('/login', 'show');
    // TODO VALIDAR DATOS
    Route::post('/login', 'login');
});

// * VER DETALLES DE LA PELICULA
Route::get('/movies/{id}', [MovieDetailsController::class, 'show']);

// * GUARDAR UN COMENTARIO
Route::post('/movies/comment/{id}', [SaveCommentController::class, 'store']);

// ! USERS

// * LOGOUT
Route::get('/logout', [LogoutController::class, 'logout']);

// ! ADMIN
Route::get('/movie/register', [RegisterMoviesController::class, 'show']);

Route::post('/movie/register', [RegisterMoviesController::class, 'store']);