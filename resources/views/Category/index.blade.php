@extends('Layouts.AdminHome')
@section('title','Categories')
@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Movies</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/movies/create" class="btn btn-primary">New Film</a>
                {{-- <input type="submit" value="Create" class="btn btn-primary" onclick="return window.location.href='/movies/create'" ></input> --}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="table-responsive">
    <input type="submit" value="Create" class="btn btn-success mt-2 me-2" onclick="return window.location.href='/categories/create'" ></input>
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @if(isset($categories))
            @foreach($categories as $cat)
                <tr class="">
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
            @else
            <h2>The List Is Empty</h2>
            @endif
        </tbody>
    </table>
</div>
@endsection

