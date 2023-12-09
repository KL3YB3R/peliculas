<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_movie',
        'id_user',
        'username',
        'comment',
        'comment_points'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
