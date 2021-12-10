@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('message')
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
    <form action="{{route('rooms.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-3">
        <div class="input-group">
            <span class="input-group-text text-white" style="background-color: #222629" id="basic-addon1">Room Name</span>
            <label>
                <input type="text" class="form-control" name="name" required aria-describedby="basic-addon1">
            </label>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <button type="submit"  class="btn text-white rounded-pill" style="background-color: #61892f; margin: 1em">Create</button>
        </div>
    </div>
    </form>
@endsection
