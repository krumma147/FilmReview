<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies, 200);
    }
}

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string',
        'overview' => 'required|string',
        'rating' => 'required|numeric',
        'release_date' => 'required|date',
        // Add more validation rules for other fields
    ]);

    // Create a new movie using the validated data
    $movie = new Movie();
    $movie->title = $request->title;
    $movie->overview = $request->overview;
    $movie->rating = $request->rating;
    $movie->release_date = $request->release_date;
    // Set other movie attributes

    // Save the movie to the database
    $movie->save();

    // Return a response indicating success and the created movie data
    return response()->json([
        'message' => 'Movie created successfully',
        'movie' => $movie
    ], 201); // 201 status code indicates "Created"
}