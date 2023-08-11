<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        
        return view('Movie.Admin.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Movie.Admin.create', compact('categories'));
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
        // if ($request->hasFile('image')) {
            //$imageName = $image->getClientOriginalName(); // Get the original file name
            //$image->storeAs('public/images', $image); // Store in 'storage/app/public/images' directory with the original name
            // }
        //$image = $request->image;
        $image = $request->file('image');
        //dd($image);
        $extension = $image->getClientOriginalExtension(); // Get the original file extension
        $imagename = time() . '.' . $extension; // Combine with timestamp to create a unique file name
        $image->move('images', $imagename);

        $movie->image_url = $imagename;

        $movie->save();
        $movie->categories()->attach($request->input('Categories'));
        
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie= Movie::find($id);
        return view('Movie.Admin.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $categories = Category::all();
        return view('Movie.Admin.create', compact('movie'), compact('categories'));
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Store in 'storage/app/public/images' directory
            $movie->image_url = $imagePath;
        }

        $movie->Categories()->sync($request->categories);
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
