@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @forelse($rooms as $room)
    <div class="row" style="margin: 1em">
        <div class="col">
            {{$room['name']}}
        </div>
        <div class="col">
            {{$room['type']}}
        </div>
        <div class="col">
            <form action="{{route('rooms.show',['room'=>$room['slug']])}}" method="post">
                @method('get')
                @csrf
            <button type="submit" class="btn text-white rounded-pill" style="background-color: #61892f">Connect to room</button>
            </form>
        </div>
    </div>
    @empty
        <h1>No Rooms</h1>
    @endforelse
    {{$rooms->links()}}
@endsection
