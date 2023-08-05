@extends('Layout.homepage')
@section('title','Add User')


@if(!isset($user))
@section('content')
<div class="container">
    <form action="/users" method="POST">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control" name="name" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text"
                class="form-control" name="email" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text"
                class="form-control" name="password"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="usertype" class="form-label">User Type</label>
                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="form-check-input" name="usertype" value="1" autocomplete="off">
                    <label class="form-check-label" for="btncheck1">Admin</label>
                </div>
                
                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="form-check-input" name="usertype" value="0" autocomplete="off" checked>
                    <label class="form-check-label" for="btncheck2">User</label>
                </div>
            </div>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
    
        <div class="d-grid gap-2">
            <button type="submit" name="" id="" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
@else
@section('content')
<div class="container">
    <form action="/users/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control" name="name" aria-describedby="helpId" value="{{$user->name}}">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text"
                class="form-control" name="email" aria-describedby="helpId" value="{{$user->email}}">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text"
                class="form-control" name="password"  aria-describedby="helpId" value="{{$user->password}}">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="usertype" class="form-label">User Type</label>
                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="form-check-input" name="usertype" value="1" autocomplete="off">
                    <label class="form-check-label" for="btncheck1">Admin</label>
                </div>
                
                <div class="form-check form-check-inline" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="form-check-input" name="usertype" value="0" autocomplete="off" checked>
                    <label class="form-check-label" for="btncheck2">User</label>
                </div>
            </div>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
    
        <div class="d-grid gap-2">
            <button type="submit" name="" id="" class="btn btn-primary">Update</button>
        </div>
            
    </form>
</div>
@endsection
@endif