<base href="/public">
@extends('Layouts.AdminHome')
@section('title','Add New Movie')
@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Managing Post</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="movies" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
    <!-- Main content -->
<section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            @if(!isset($post))
                <!-- Create New -->
                <h2 class="text-center">Add New Post</h2>
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="content" class="form-label">Post Content</label>
                                            <input type="text"
                                                class="form-control" name="content" aria-describedby="helpId" >
                                            <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>


                                        <div class="mb-2">
                                            <label for="rating" class="form-label">Movie Rating</label>
                                            <input type="range" id="myRange" class="form-range" min="0" max="5" step="0.5" value="2" name="rating" aria-describedby="helpId">
                                            <p id="rangeValue">Value: </p>
                                        </div>           
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="mb-4 d-flex">
                                            <label for="category_id">For Movie: </label>
                                            <select class="select col-md-3 offset-md-1" name="movie" id="category_id">
                                                @foreach($movies as $movie)
                                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 d-flex">
                                            <label for="uploadDate" class="form-label">Day Upload</label>
                                            <div class="col-5">
                                                <div class="input-group date" id="datepicker">
                                                    <input type="date" class="form-control" id="date" name="uploadDate" />
                                                </div>
                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3 ">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="d-grid gap-2">
                                    <a type="submit" class="btn btn-danger" onclick="return window.location.href='/posts'">Cancel</a>
                                </div>
                            </div>
                        </div>
                </form>
                @else

            <!-- Editing -->
                <h2 class="text-center">Editing Post</h2>
                <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="content" class="form-label">Post Content</label>
                                            <input type="text"
                                                class="form-control" name="content" aria-describedby="helpId" value="{{$post->content}}">
                                            <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>


                                        <div class="mb-2">
                                            <label for="rating" class="form-label">Movie Rating</label>
                                            <input type="range" id="myRange" class="form-range" min="0" max="5" step="0.5" value="{{$post->rating}}" name="rating" aria-describedby="helpId">
                                            <p id="rangeValue">Value: </p>
                                        </div>           
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="mb-4 d-flex">
                                            <label for="category_id">For Movie: </label>
                                            <select class="select col-md-3 offset-md-1" name="movie" id="category_id">
                                                @foreach($movies as $movie)
                                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 d-flex">
                                            <label for="uploadDate" class="form-label">Day Upload</label>
                                            <div class="col-5">
                                                <div class="input-group date" id="datepicker">
                                                    <input type="date" class="form-control" id="date" name="uploadDate" value="{{$post->uploadDate}}"/>
                                                </div>
                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3 ">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="d-grid gap-2">
                                    <a type="submit" class="btn btn-danger" onclick="return window.location.href='/posts'">Cancel</a>
                                </div>
                            </div>
                        </div>    
                </form>
            @endif					
        </div>
        <!-- /.card -->
</section>
    <!-- /.content -->
@endsection

