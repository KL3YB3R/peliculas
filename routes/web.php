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

// TODO VISTA HOME
Route::get('/', [HomeController::class, 'show']);

// TODO MOSTRAR LAS PELICULAS
Route::get('/', [MovieController::class, 'index']);

// ! SIN LOGUEAR
// TODO MOSTRAR LA VISTA REGISTER
Route::get('/register', [RegisterController::class, 'show']);

// TODO ENVIAR EL REGISTRO
Route::post('/register', [RegisterController::class, 'register']);

// TODO MOSTRAR VISTA LOGIN
Route::get('/login', [LoginController::class, 'show']);

// TODO VALIDAR DATOS
Route::post('/login', [LoginController::class, 'login']);

// TODO MOSTRAR VISTA HOME
Route::get('/home', [HomeController::class, 'show']);

Route::get('/home', [MovieController::class, 'index']);

// TODO VER DETALLES DE LA PELICULA
Route::get('/movies/{id}', [MovieDetailsController::class, 'show']);

// TODO GUARDAR UN COMENTARIO
Route::post('/movies/comment/{id}', [SaveCommentController::class, 'store']);


// ! USERS

// TODO LOGOUT
Route::get('/logout', [LogoutController::class, 'logout']);

// ? ADMIN
Route::get('/movies/register', [RegisterMoviesController::class, 'show']);

Route::post('/movies/register', [RegisterMoviesController::class, 'store']);
