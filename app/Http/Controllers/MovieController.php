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
    public function getMovies()
    {
        $movies = Movie::all();
        $film = null;

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
                $comment = array(
                    'usernameComment' => $comm->username,
                    'comment' => $comm->comment
                );
            }

            $film[] = array(
                'movieId' => $movie->id,
                'movieName' => $movie->name,
                'movieImage' => $movie->image,
                'moviePoints' => $movie->movie_points,
                'usernameComment' => $comment['usernameComment'],
                'comment' => $comment['comment'],
            );
        }

        return $film;
    }

    public function index()
    {
        // * LLAMAR PELICULAS
        $film = $this->getMovies();
        return view('home.index', ['movies' => $film]);
    }

    public function showMovies()
    {
        // * LLAMAR PELICULAS
        $film = $this->getMovies();
        return view('home.movies', ['movies' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
