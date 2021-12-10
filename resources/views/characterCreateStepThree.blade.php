@extends('layouts.layout')
@section('content')
    <form enctype="multipart/form-data" action="{{route('characters.store',['player_id'=>$player])}}" method="post">
        @csrf
        <input type="hidden" name="race" value="cho-to">

    <div class="row">
        <div class="col">
            <label>
                Name
                <input type="text" name="name" value="{{$name}}">
            </label>
        </div>
        <div class="col">
            <input type="file" id="avatar" name="avatar">
        </div>
        <div class="col">
            <label>
                Hp
                <input type="text" name="health" value="{{$hp}}">
            </label>
            <div class="col">
                <label>
                    Class
                    <input type="text" name="metier_name" value="{{$metier}}">
                </label>
            </div>

        </div>
    </div>
    <div class="row row-cols-3">
        @foreach($attributes as $key=>$attribute)
            <div class="col">
                {{$key}}
                <label>
                    <input type="text" name="{{$key}}" value="{{$attribute}}">
                </label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn text-white"  style="margin: 1em;background-color: #61892f">Create Character</button>
    </form>
@endsection
