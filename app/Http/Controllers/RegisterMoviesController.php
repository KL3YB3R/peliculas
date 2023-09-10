<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterMoviesRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class RegisterMoviesController extends Controller
{
    // ! MOSATRAR LA VISTA DEL REGISTRO DE LAS PELICULAS
    public function show()
    {
        return view('admin.registerMovies');
    }

    // ! GUARDAR LOS DATOS DE LA PELICULA
    public function store(RegisterMoviesRequest $request)
    {
        // ! REGISTRA LA PELICULA
        $movie = Movie::create($request->getDirectionImage());

        return redirect('/movies/register')->with('success', 'Account created successfully');
    }
}
