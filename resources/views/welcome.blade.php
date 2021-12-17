@extends('layouts.layout')
@section('content')
    <welcome name="{{$room->name}}" creator="{{$room->user->name}}"></welcome>
    <a href="{{route('users.create')}}" class="btn rounded-pill text-white" style="background-color: #61892f">Register now</a>
@endsection
