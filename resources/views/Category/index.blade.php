@extends('Layout.homepage')
@section('title','Categories')
@section('content')
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
        </tbody>
    </table>
</div>
@endsection
