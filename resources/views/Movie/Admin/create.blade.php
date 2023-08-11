@extends('Layouts.AdminHome')
@section('title','Add New Movie')
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container">
            <div class="card">
                <div class="card-body">								
                    <script>
                        $(function(){
                            $('#datepicker').datepicker();
                        });
                    </script>
                @if(!isset($movie))
                <!-- Create New -->
                    <form action="/movies" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="d-inline mb-3">
                            <h2 class="text-center">Add New Movie</h2>
                            <div class="mb-2">
                                <label for="title" class="form-label">Movie Title</label>
                                <input type="text"
                                    class="form-control" name="title" aria-describedby="helpId" >
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2">
                                <label for="overview" class="form-label">Movie Description</label>
                                <input type="text"
                                    class="form-control" name="overview" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2 d-flex">
                                <label for="category_id">Category: </label>
                                <select class="select col-md-3 offset-md-1" name="Categories[]" id="category_id" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="language" class="form-label">Language</label>
                                <input type="text" class="form-control" name="language" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2">
                                <label for="status" class="form-label">Status:</label>
                                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="radio" class="form-check-input" name="status" value="1" autocomplete="off">
                                    <label class="form-check-label" for="btncheck1">Released</label>
                                </div>
                                    
                                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="radio" class="form-check-input" name="status" value="0" autocomplete="off" checked>
                                    <label class="form-check-label" for="btncheck2">Unreleased</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="release_date" class="form-label">Release Date</label>
                                <div class="col-5">
                                    <div class="input-group date" id="datepicker">
                                        <input type="date" class="form-control" id="date" name="release_date" />
                                    </div>
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                            </div>
                            
                            <div class="mb-2">
                                <label for="rating" class="form-label">Movie Rating</label>
                                <input type="text" class="form-control" name="rating" aria-describedby="helpId">
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="helpId">
                            </div>

                        </div>
                    
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @else

                <!-- Editing -->
                    <form action="/movies/{{$movie->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2 class="text-center">Editing Movie</h2>
                            <div class="mb-2">
                                <label for="title" class="form-label">Movie Title</label>
                                <input type="text" class="form-control" name="title" aria-describedby="helpId" value="{{$movie->title}}" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2">
                                <label for="overview" class="form-label">Movie Description</label>
                                <input type="text" class="form-control" name="overview" aria-describedby="helpId" value="{{$movie->overview}}" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2">
                                <label for="language" class="form-label">Language</label>
                                <input type="text" class="form-control" name="language" aria-describedby="helpId" value="{{$movie->language}}" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-2">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="radio" class="form-check-input" name="status" value="1" autocomplete="off" {{$movie->status == 1 ? 'checked' : ''}} />
                                    <label class="form-check-label" for="btncheck1">Released</label>
                                </div>

                                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="radio" class="form-check-input" name="status" value="0" autocomplete="off" {{$movie->status == 1 ? 'checked' : ''}} checked />
                                    <label class="form-check-label" for="btncheck2">Unreleased</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="release_date" class="form-label">Release Date</label>
                                <div class="col-5">
                                    <div class="input-group date" id="datepicker">
                                        <input type="date" class="form-control" id="date" name="release_date" value="{{$movie->release_date}}" />
                                    </div>
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="rating" class="form-label">Movie Rating</label>
                                <input type="text" class="form-control" name="rating" aria-describedby="helpId" value="{{$movie->rating}}">
                            </div>

                            
                            <div class="mb-2">
                                <label class="form-label">Movie Image: </label>
                                <img src="{{ asset('images/' . $movie->image_url)}}" alt="Movie {{$movie->image_url}}" style="height: 150px; width: auto;" />
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">New Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="helpId">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>     
                    </form>
                </div>

                <script>
                    $(function(){
                        $('#datepicker').datepicker();
                    });
                </script>
                @endif
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->


<div class="container justify-content-center mt-4">
    
@endsection