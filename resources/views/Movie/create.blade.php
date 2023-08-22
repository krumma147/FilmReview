<base href="/public">
@extends('Layouts.AdminHome')
@section('title','Add New Movie')
@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Managing New Movie</h1>
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
            @if(!isset($movie))
                <!-- Create New -->
                <h2 class="text-center">Add New Movie</h2>
                <form action="/movies" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
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
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4 d-flex">
                                            <label for="category_id">Category: </label>
                                            <select class="select col-md-3 offset-md-1" name="Categories[]" id="category_id" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
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

                                        <div class="mb-2 d-flex">
                                            <label for="release_date" class="form-label">Release Date</label>
                                            <div class="col-5">
                                                <div class="input-group date" id="datepicker">
                                                    <input type="date" class="form-control" id="date" name="release_date" />
                                                </div>
                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="language" class="form-label">Language</label>
                                            <input type="text" class="form-control" name="language" aria-describedby="helpId">
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
                                        <div class="mb-2">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="helpId">
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
                                    <a type="submit" class="btn btn-danger" onclick="return window.location.href='/movies'">Cancel</a>
                                </div>
                            </div>
                        </div>
                </form>
                @else

                <!-- Editing -->
                <h2 class="text-center">Editing Movie</h2>
                <form action="/movies/{{$movie->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4 d-flex">
                                        <label for="category_id">Category: </label>
                                        <select class="select col-md-3 offset-md-1" name="Categories[]" id="category_id" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2">
                                        <label for="status" class="form-label">Status:</label>
                                        <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="radio" class="form-check-input" name="status" value="1" autocomplete="off" {{$movie->status == 1 ? 'checked' : ''}} />
                                            <label class="form-check-label" for="btncheck1">Released</label>
                                        </div>
        
                                        <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="radio" class="form-check-input" name="status" value="0" autocomplete="off" {{$movie->status == 1 ? 'checked' : ''}} checked />
                                            <label class="form-check-label" for="btncheck2">Unreleased</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 d-flex">
                                        <label for="release_date" class="form-label">Release Date</label>
                                        <div class="col-5">
                                            <div class="input-group date" id="datepicker">
                                                <input type="date" class="form-control" id="date" name="release_date" value="{{$movie->release_date}}" />
                                            </div>
                                            <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label for="language" class="form-label">Language</label>
                                        <input type="text" class="form-control" name="language" aria-describedby="helpId" value="{{$movie->language}}" />
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>
    
                                    <div class="mb-2">
                                        <label for="rating" class="form-label">Movie Rating</label>
                                        <p id="valueDisplay">Value: {{$movie->rating}}</p>
                                        <input type="range" class="form-range" min="0" max="5" step="0.5" value="0" name="rating" aria-describedby="helpId" value="{{$movie->rating}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Movie Image: </label>
                                        <img src="{{ asset('images/' . $movie->image_url)}}" alt="Movie {{$movie->image_url}}" style="height: 150px; width: auto;" />
                                    </div>
                                    
                                    <div class="mb-2">
                                        <label for="image" class="form-label">New Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3 ">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="d-grid gap-2">
                                <a type="submit" class="btn btn-danger" onclick="return window.location.href='/movies'">Cancel</a>
                            </div>
                        </div>
                    </div>     
                </form>
            @endif					
        </div>
        <!-- /.card -->
</section>
    <!-- /.content -->
    <script>
        $(function(){
            $('#datepicker').datepicker();
        });
        const rangeInput = document.querySelector('input[name="rating"]');
        const valueDisplay = document.getElementById('valueDisplay');

        rangeInput.addEventListener('input', function() {
            const value = rangeInput.value;
            valueDisplay.innerHTML = `Value: ${value}`;
        });
    </script>
@endsection

