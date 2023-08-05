@extends('Layout.homepage')
@section('title','Users Display')
@section('content')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Usertype</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="">
                    <td scope="row">{{$user->id}}</td>
                    <td>
                        <a href="/users/{{$user->id}}">
                            {{$user->name}}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->usertype ? "Admin" : "User"}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit">Edit</a>

                        <input type="submit" value="Delete"></input>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
