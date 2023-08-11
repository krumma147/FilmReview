@extends('Layouts.basiclayout')
@section('title','Add New Category')

<div class="container justify-content-center mt-4">
@section('content')
@if(!isset($cat))

<!-- Create New -->

    <form action="/categories" method="POST">
    @csrf
        <div class="d-inline mb-3">
            <h2 class="text-center">Add New Category</h2>
            <div class="mb-2">
                <label for="name" class="form-label">Category Name</label>
                <input type="text"
                    class="form-control" name="name" aria-describedby="helpId" >
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
    
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @else

<!-- Editing -->

    <form action="/categories/{{$cat->id}}" method="POST">
    @csrf
    @method('PUT')
    <h2 class="text-center">Editing Movie</h2>
        <div class="mb-2">
            <label for="name" class="form-label">Movie Title</label>
            <input type="text" class="form-control" name="name" aria-describedby="helpId" value="{{$cat->name}}" />
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>     
    </form>
</div>

@endif
@endsection