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
    <Room :room="{{$room}}"></Room>
    <RoomEdit :room="{{$room}}"></RoomEdit>
    <invite></invite>
{{--    <character :character="{{$character}}"></character>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8">--}}
{{--            <span class="border border-dark"></span>--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            <span class="border border-dark">--}}
{{--                <a href="{{route('rooms.edit',['room' => $room->slug])}}" class="btn btn-md text-white rounded-pill" style="margin: 1em;background-color: #61892f">Edit room</a>--}}
{{--                    <form action="{{route('invite',['room'=>$room->slug])}}" method="post">--}}
{{--                        @csrf--}}
{{--                    <span class="input-group-text bg-dark text-white" id="basic-addon1">User Name</span>--}}
{{--                        <label>--}}
{{--                    <input type="text" name="name">--}}
{{--                        </label>--}}
{{--                        <button type="submit" class="btn rounded-pill text-white" style="background-color: #61892f">Invite Player</button>--}}
{{--                    </form>--}}
{{--                <a href="{{route('createCharacter.stepOne',['player'=>$player->id])}}" class="btn rounded-pill text-white" style="background-color: #61892f">Create Character</a>--}}
{{--                @if($player->characters!==null)--}}
{{--                    <a href="{{route('characters.show',['character' => $player->characters->id])}}" class="btn rounded-pill text-white" style="background-color: #61892f">Show Character</a>--}}
{{--                @endif--}}
{{--            </span>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
        <script>
            import Character from "../js/components/character";
            export default {
                components: {Character}
            }
        </script>
