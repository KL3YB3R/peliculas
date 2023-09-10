<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        // $comments = DB::table('comments')
        //     ->where('id', $id)
        $film = "";

        foreach ($movies as $movie) {
            $idMovie = $movie->id;
            $comments = DB::table('comments')
                ->where('id_movie', $idMovie)
                ->join('users', 'users.id', '=', 'comments.id_user')
                ->orderBy('comments.created_at', 'desc')
                ->limit(1)
                ->get();

            $film = [
                'movieId' => $movie->id,
                'movieName' => $movie->name,
                'movieImage' => $movie->image,
                'moviePoints' => $movie->movie_points,
                // 'usernameComment' => $comments->username,
                // 'comment' => $comments->comment
            ];
        }

        // $comments = DB::table('movies')
        //     ->select('*')
        //     ->join('comments', 'movies.id', '=', 'comments.id_movie')


        return view('home.index', ['movies' => $film]);
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
