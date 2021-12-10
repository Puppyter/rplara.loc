@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col">
        <h1>{{$user['name']}}</h1>
    </div>
</div>
<div class="row">
    <table class="table table-borderless">
        @forelse($rooms as $room)
            <tbody>
            <td><h5 class="card-title text-white">
                    {{$room['name']}}
                </h5></td>
            <td>
                <h5 class="text-white">{{$room['next_game']}}</h5>
            </td>
            <td>
                <form action="{{route('rooms.show',[$room['slug']])}}" method="post">
                    @method('GET')
                    <button type="submit" name="slug"  class="btn text-white rounded-pill" style="background-color: #61892f" value="{{$room['slug']}}">Visit room</button>
                </form>
            </td>
            </tbody>
        @empty
            No rooms
        @endforelse
    </table>
</div>
@endsection
@section('sidebar')
    <div class="btn-group-vertical" role="group" aria-label="Basic mixed styles example">
    <a href="{{route('rooms.create')}}" class="btn text-white rounded-pill" style="background-color: #61892f">CREATE ROOM</a>
        <a href="{{route('users.edit',['user' => $user['id']])}}"  class="btn text-white rounded-pill" style="background-color: #61892f">Edit information</a>
        <a href="{{route('logout')}}"  class="btn text-white rounded-pill" style="background-color: #61892f">Logout</a>
    </div>
@endsection
