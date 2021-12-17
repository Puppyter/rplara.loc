@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('password')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    @endif
    <h1 class="text-white">REGISTRATION</h1>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="inputName" class="col-sm-2 col-form-label text-white">Username</label>
            <div class="col-sm-10">
                <input type="text" id="inputName" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <label for="inputEmail" class="col-sm-2 col-form-label text-white">Email</label>
            <div class="col-sm-10">
                <input type="text" id="inputEmail" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <label for="inputPassword" class="col-sm-2 col-form-label text-white">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" value="{{old('password')}}">
            </div>
        </div>
        <button type="submit" class="btn rounded-pill text-white" style="background-color: #61892f">Register now</button>
    </form>
@endsection
