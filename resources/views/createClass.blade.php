@extends('layouts.layout')
@section("content")
    <form action="{{route('class.store')}}" method="post">
        @method('get')
    <input type="text" name="name">
    <div class="row row-cols-3">
        <div class="col">
            strength
            <input type="number" name="strength" min="0" max="20" value="8">
        </div>
        <div class="col">
            dexterity
            <input type="number" name="dexterity" min="0" max="20" value="8">
        </div>
        <div class="col">
            constitution
            <input type="number" name="constitution" min="0" max="20" value="8">
        </div>
        <div class="col">
            intellect
            <input type="number" name="intellect" min="0" max="20" value="8">
        </div>
        <div class="col">
            wisdom
            <input type="number" name="wisdom" min="0" max="20" value="8">
        </div>
        <div class="col">
            charisma
            <input type="number" name="charisma" min="0" max="20" value="8">
        </div>
        <button type="submit">Create</button>
    </div>
    </form>
@endsection
