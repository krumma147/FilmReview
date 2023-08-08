<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->status = $request->status;
        $movie->overview = $request->overview;
        $movie->language = $request->language;
        $movie->rating = $request->rating;
        $movie->release_date = $request->release_date;
        $movie->save();
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        return view('movie.create', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->status = $request->status;
        $movie->overview = $request->overview;
        $movie->language = $request->language;
        $movie->rating = $request->rating;
        $movie->release_date = $request->release_date;
        $movie->image_url = $request->image_url;
        $movie->save();
        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/movies');
    }
}
