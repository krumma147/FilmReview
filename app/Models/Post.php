<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable=[
        'content',
        'dayUpload',
        'rating',
        'movie_id',
        'author'
    ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
