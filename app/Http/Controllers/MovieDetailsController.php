<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieDetailsController extends Controller
{
    public function show($id)
    {
        // ! TRAER INFORMACION DE LA PELICULA
        $movie = Movie::find($id);

        // ! TRAER LOS COMENTARIOS CON LA INFORMACION DE LOS USUARIOS
        $comments = DB::table('comments')
            ->select("comments.*", 'users.username', 'users.name', 'users.image', 'users.email')
            ->where('id_movie', $id)
            ->join('users', 'users.id', '=', 'comments.id_user')->get();
        // $users = User::all()->where('id', $comments->id_user);

        return view('home.movieDetails', ['movie' => $movie, 'comments' => $comments, 'user' => Auth::user()]);
    }
}
