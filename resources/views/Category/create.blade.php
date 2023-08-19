<base href="/public">
@extends('Layouts.AdminHome')
@section('title','Add New Category')
@section('content')


<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Managing category Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="movies" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @if(!isset($cat))
            <!-- Create New -->
        <h2 class="text-center">Add New Category</h2>
        <form action="/categories" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text"
                                class="form-control" name="name" aria-describedby="helpId" >
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-grid gap-2">
                        <a type="submit" class="btn btn-danger" onclick="return window.location.href='/categories '">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        @else
        <!-- Editing -->
        <form action="/categories/{{$cat->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="helpId" value="{{$cat->name}}" />
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-grid gap-2">
                        <a type="submit" class="btn btn-danger" onclick="return window.location.href='/categories '">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@endif
@endsection
