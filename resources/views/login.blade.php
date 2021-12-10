@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        @error('password')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    @endif
    <h1>LOGIN</h1>
    <form method="post" action="{{route('login')}}">
        <div class="mb-3 row">
            @csrf
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" id="inputEmail" class="form-control" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
        </div>
        <div class="btn-group-vertical">

            <button type="submit" class="btn btn-dark">AUTHORIZE</button>
        </div>
    </form>
    <form method="get" action="{{route('users.create')}}">
        @csrf
        <label>DONT HAVE ACCOUNT?</label><span>
            <button type="submit" class="btn btn-dark">Register now</button>
        </span>
    </form>
@endsection
