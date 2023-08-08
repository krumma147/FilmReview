@extends('Layout.moviehome')
@section('title','Movie Review')
@section('content')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Overview</th>
                <th scope="col">Language</th>
                <th scope="col">Rating</th>
                <th scope="col">Release_date</th>
                <th scope="col">Action</th>
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
                    <td>{{$movie->rating}}</td>
                    <td>{{$movie->release_date}}</td>
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
