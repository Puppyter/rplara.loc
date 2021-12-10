@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('message')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        @endif
    <form action="{{route('rooms.update',['room'=>$slug])}}" method="post">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text text-white" style="margin: 1em; background-color: #222629" id="basic-addon1">Room Name</span>
                    <label>
                        <input type="text" class="form-control" style="margin: 1em" value="{{$name}}" name="name" required aria-describedby="basic-addon1">
                    </label>
                </div>
                <label>
                    <input type="date" name="next_game" style="margin: 1em" class="form-control" value="{{$next_game}}">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" name="slug" class="btn text-white" style=" margin: 1em;background-color: #61892f" value="{{$slug}}">Create</button>
            </div>
        </div>
    </form>
@endsection
