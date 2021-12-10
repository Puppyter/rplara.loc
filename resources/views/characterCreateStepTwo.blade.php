@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col">
        <h4>Attributes max value 15, min value 1, all skill points 48, calculate yourself</h4>
    </div>
</div>
<form action="{{route('createCharacter.stepThree',['player'=>$player])}}" method="post">
    @method('get')
    @csrf
<div class="row row-cols-3">
    <div class="col">
        strength
        <input type="number" name="strength" min="1" max="15" value="{{8}}">
    </div>
    <div class="col">
        dexterity
        <input type="number" name="dexterity" min="1" max="15" value="{{8}}">
    </div>
    <div class="col">
        constitution
        <input type="number" name="constitution" min="1" max="15" value="{{8}}">
    </div>
    <div class="col">
        intellect
        <input type="number" name="intellect" min="1" max="15" value="{{8}}">
    </div>
    <div class="col">
        wisdom
        <input type="number" name="wisdom" min="1" max="15" value="{{8}}">
    </div>
    <div class="col">
        charisma
        <input type="number" name="charisma" min="1" max="15" value="{{8}}">
    </div>
    <button type="submit" class="btn text-white"  style="margin: 1em;background-color: #61892f">Next Step</button>
</div>
</form>
@endsection
