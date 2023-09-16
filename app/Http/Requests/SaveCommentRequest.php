<?php

namespace App\Http\Requests;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class SaveCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required',
            'comment_points' => 'required'
        ];
    }

    public function getCommentDetails($id)
    {
        $user = User::find(session('idUser'));

        return [
            'id_user' => $user->id,
            'id_movie' => $id,
            'username' => $user->username,
            'comment' => $this->get('comment'),
            'comment_points' => $this->get('comment_points')
        ];
    }

    public function getValorationMovie($id)
    {
        $movieAndComments = DB::table('comments')
            ->select('comments.comment_points', 'movies.movie_points')
            ->where('id_movie', $id)
            ->join('movies', 'comments.id_movie', '=', 'movies.id')->get();

        $totalPoints = 0;
        $count = 0;

        foreach ($movieAndComments as $key => $points) {
            $count++;
            $totalPoints += $points->comment_points;
        }
        $moviePoints = number_format($totalPoints / $count, 1);


        return $moviePoints;
    }
}
