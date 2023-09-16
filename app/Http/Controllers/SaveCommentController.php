<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCommentRequest;
use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class SaveCommentController extends Controller
{
    public function store(SaveCommentRequest $request, $id)
    {
        // ! CREAR NUEVO COMENTARIO
        $user = Comment::create($request->getCommentDetails($id));

        // ! ACTUALIZAR VALORACION DE LA PELICULA
        $movie = Movie::find($id);
        $movie->movie_points = $request->getValorationMovie($id);
        $movie->save();
        // dd($request->getValorationMovie($id));
        return
            redirect('/movies/' . $request->id)->with('success', 'Account created successfully');
    }
}
