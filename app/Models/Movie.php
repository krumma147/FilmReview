<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movie";
    protected $fillable = [
        "title",
        // "genre",
        "status",
        "original_title",
        "overview",
        "origin_country",
        "language",
        "rate",
        'release_date',
        'upload_date'
    ];
}
