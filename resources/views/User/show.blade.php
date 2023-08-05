@extends('Layout.homepage')
@section('title','User Detail')
@section('content')
<div class="card">
    <img class="card-img-top" src="holder.js/100x180/" alt="Title">
    <div class="card-body">
        <h4 class="card-title">{{$user->name}}</h4>
        <p class="card-text">{{$user->email}}</p>
        <p class="card-text">{{$user->usertype ? "Admin" : "User"}}</p>
    </div>
</div>
@endsection
