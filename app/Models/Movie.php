<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movies";
    protected $fillable = [
        "title",
        // "genre",
        "status",
        "overview",
        "language",
        "rating",
        'release_date',
        'image_url',
        //'upload_date'
    ];

    public function Categories(){
        return $this->belongsToMany(Category::class);
    }
}
