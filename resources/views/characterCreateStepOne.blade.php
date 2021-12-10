@extends('layouts.layout')
@section('content')
    <form action="{{route('createCharacter.stepTwo',['player'=>$player])}}" method="post">
        @csrf
<div class="row row-cols-2">
    <div class="col">
        <label for="inputName" class="col-sm-2 col-form-label">Hero name</label>
        <input type="text" name="name" id="inputName">
    </div>
    <div class="col">
        <p><label>
                <select name="metier">
                        <option disabled>Choose Class</option>
                    @foreach($metiers as $metier)
                        <option value="{{$metier}}">{{$metier}}</option>
                    @endforeach
                    </select>
            </label></p>
    </div>
    <button type="submit" class="btn text-white" style="margin: 1em;background-color: #61892f">Next Step</button>
</div>
    </form>
@endsection
