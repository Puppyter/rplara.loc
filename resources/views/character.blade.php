@extends('layouts.layout')
@section('content')
    @if($errors->any())
        @error('message')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    @endif
    <div class="row row-cols-2">
        <div class="col">
            <img src="{{$character->avatar}}" alt="...">
        </div>
        <div class="col">
            Name
            <h5>{{$character->name}}</h5>
        </div>
    </div>
    <div class="row row-cols-2">
        <div class="col">
            Level
            <h5>{{$character->level}}</h5>
        </div>
        <div class="col">
            HP
            <h5>{{$character->health}}</h5>
        </div>
    </div>
    <div class="row row-cols-3">
        <div class="col">
            strength:
            {{$character->strength}}
        </div>
        <div class="col">
            dexterity:
            {{$character->dexterity}}
        </div>
        <div class="col">
            constitution:
            {{$character->constitution}}
        </div>
        <div class="col">
            intellect:
            {{$character->intellect}}
        </div>
        <div class="col">
            wisdom:
            {{$character->wisdom}}
        </div>
        <div class="col">
            charisma:
            {{$character->charisma}}
        </div>
    </div>
@endsection
@section('sidebar')
    <a href="{{route('rooms.show',['room'=>$character->player->room->slug])}}" class="btn text-white"  style="margin: 1em;background-color: #61892f">Back to room</a>
    <a href="{{route('characters.edit',['character'=>$character->id])}}" class="btn text-white"  style="margin: 1em;background-color: #61892f">Edit Character</a>
@endsection
