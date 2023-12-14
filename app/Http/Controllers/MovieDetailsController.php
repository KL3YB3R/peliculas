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

        // $datePublished = date_format(date()$movie->date_published, 'd-m-Y');
        $datePublished = $this->validateDateWithSpace($movie->date_published, 'Sin fecha');

        return view('home.movieDetails', ['movie' => $movie, 'datePublished' => $datePublished, 'comments' => $comments, 'user' => Auth::user()]);
    }

    public function validateDateWithSpace($field, $value)
    {
        if (empty($field) || $field === 'NULL') $result = $value;
        else {
            $dates = explode("-", $field);
            $result = $dates[2] . ' / ' . $dates[1] . ' / ' . $dates[0];
        }
        return $result;
    }
}
