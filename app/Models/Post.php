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
        'movie',
        'author'
    ];

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie');
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
