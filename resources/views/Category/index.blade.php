@extends('Layouts.AdminHome')
@section('title','Categories')
@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/categories/create" class="btn btn-primary">Add New Category</a>
                {{-- <input type="submit" value="Create" class="btn btn-primary" onclick="return window.location.href='/movies/create'" ></input> --}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Default box -->
<div class="container-fluid">
<div class="card">
<div class="card-header">
<div class="card-tools">
    <div class="input-group input-group" style="width: 250px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
</div>
</div>
<div class="card-body table-responsive p-0">								
<table class="table table-hover text-nowrap">
    @if(count($categories) == 0 || $categories == null)
        <h4 class="text-danger text-center">The List is empty</h4>
    @else
<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($categories as $cat)
        <tr class="text-center">
            <td scope="row">{{$cat->id}}</td>
            <td>
                <a href="/categories/{{$cat->id}}">
                    {{$cat->name}}
                </a>
                </td>
            <td class="d-flex">
                <input type="submit" value="Edit" class="btn btn-primary mt-2 me-2" onclick="return window.location.href='/categories/{{$cat->id}}/edit'" ></input>
                <form action="categories/{{$cat->id}}" method="POST">
                        @csrf
                     @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger mt-2" onclick="return confirm('Are you sure?')" ></input>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
@endif
@endsection
