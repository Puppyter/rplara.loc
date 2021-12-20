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
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row row-cols-2">
        <div class="col">
            @if($character == null)
                <character-create :metiers="{{$metiers}}"></character-create>
            @else
                <character :character="{{$character}}"></character>
            @endif
        </div>
        <div class="col">
            <Room :room="{{$room}}" ></Room>
            <room-edit :room="{{$room}}"></room-edit>
            <invite></invite>
        </div>
    </div>
@endsection

