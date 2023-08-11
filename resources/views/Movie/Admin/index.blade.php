@extends('Layout.moviehome')
@section('title','Movie Review')
@section('content')
<div class="table-responsive">

    <input type="submit" value="Create" class="btn btn-success mt-2 me-2" onclick="return window.location.href='/movies/create'" ></input>

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Overview</th>
                <th scope="col">Language</th>
                <th scope="col">Categories</th> 
                <th scope="col">Image</th> 
                <th scope="col">Rating</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($movies as $movie)
                <tr class="">
                    <td scope="row">{{$movie->id}}</td>
                    <td>
                        <a href="/movies/{{$movie->id}}">
                            {{$movie->title}}
                        </a>
                    </td>
                    <td>{{$movie->status}}</td>
                    <td>{{$movie->overview}}</td>
                    <td>{{$movie->language}}</td>
                    
                    
                    <td>
                        @foreach($movie->Categories as $cat)
                        <a href="/categories/{{$cat->id}}">
                            {{$cat->name}}
                        </a>
                        @endforeach
                    </td>

                    <td>
                        <img src="images/{{$movie->image_url}}" alt="{{$movie->name}} movie image" style="height: 50px; width: 50px" />
                    </td>

                    <td>{{$movie->rating}}</td>

                    <td class="d-flex">
                        <input type="submit" value="Edit" class="btn btn-primary mt-2 me-2" onclick="return window.location.href='/movies/{{$movie->id}}/edit'" ></input>
                        <form action="movies/{{$movie->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger mt-2" onclick="return confirm('Are you sure?')" ></input>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
