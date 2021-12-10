@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('message')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    @endif
    <div class="row">
        <div class="col">
            <h5>
               Sorry, but you aren't player in {{$room->name}} room, but you can send to {{$user->name}}
                request to add you in room.
            </h5>
            <form action="{{route('invite.please',['room' => $room->slug])}}" method="post">
                @csrf
                <input type="hidden" name="invitorId" value="{{$user->id}}">
                <button type="submit" class="btn btn-dark">Send request</button>
            </form>
            <a href="{{route('rooms.index')}}" class="btn btn-dark">Go back</a>
        </div>
    </div>
@endsection
