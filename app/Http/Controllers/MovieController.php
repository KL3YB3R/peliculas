<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AllMovies;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ! FUNCION PARA MOSTRAR LAS ULTIMAS PELICULAS COMENTADAS
    public function getLastestCommentedMovies()
    {
        $movies = Movie::all();
        $film = null;

        dd($movies);

        foreach ($movies as $movie) {
            $comments = DB::table('comments')
                ->select("comments.*", 'users.username', 'users.name', 'users.image', 'users.email')
                ->where('id_movie', $movie->id)
                ->join('users', 'users.id', '=', 'comments.id_user')
                ->orderBy('comments.created_at', 'desc')
                ->limit(1)
                ->get();

            $comment = array(
                'usernameComment' => null,
                'comment' => null
            );

            foreach ($comments as $comm) {
                // * CORTAR EL TEXTO GUARDADO PARA MOSTRARLO

                $comment = array(
                    'usernameComment' => $comm->username,
                    'comment' => $comm->comment,
                );
            }

            // * CORTAR EL TEXTO GUARDADO PARA MOSTRARLO
            $cutDescription = $this->cutText($movie->description, 0, 200);
            $cutComment = $this->cutText($comment['comment'], 0, 60);

            if ($cutComment !== '') {
                $film[] = array(
                    'movieId' => $movie->id,
                    'movieName' => $movie->name,
                    'movieImage' => $movie->image,
                    'movieDescription' => $movie->description,
                    'movieCutDescription' => $cutDescription,
                    'moviePoints' => $movie->movie_points,
                    'usernameComment' => $comment['usernameComment'],
                    'cutComment' => $cutComment
                );
            }
        }

        return $film;
    }

    // ! FUNCION PARA MOSTRAR LAS PELICULAS MAS PUNTUADAS
    public function getBestMoviesPointed()
    {
        // * LLAMAR LAS PELICULAS MEJORES PUNTUADAS
        $movies = Movie::where('movie_points', '!=', '0')->orderBy('movie_points', 'desc')->get();
        $film = null;

        foreach ($movies as $movie) {
            $film[] = array(
                'movieId' => $movie->id,
                'movieName' => $movie->name,
                'movieImage' => $movie->image,
                'moviePoints' => $movie->movie_points,
            );
        }

        return $film;
    }

    public function cutText($text, $minChar, $maxChar)
    {
        if (strlen($text) > $maxChar) return substr($text, $minChar, $maxChar) . "...";
        else return substr($text, $minChar, $maxChar);
    }

    public function index()
    {
        // * ULTIMAS PELICULAS COMENTADAS
        // ? ==> SOLO SE MOSTRARAN LAS PELICULAS CON COMENTARIOS INICIANDO CON LA ULTIMA COMENTADA
        $lastestCommented = $this->getLastestCommentedMovies();

        // * PELICULAS MEJORES PUNTUADAS
        // ? ==> SOLO SE MOSTRARAN LAS QUE HAN SIDO PUNTUADAS
        $bestDotted = $this->getBestMoviesPointed();

        return view('home.index', ['latestComments' => $lastestCommented, 'bestDotted' => $bestDotted]);
    }

    public function showMovies()
    {
        // * LLAMAR PELICULAS
        $film = $this->getMovies();
        return view('home.movies', ['movies' => $film]);
    }
}
