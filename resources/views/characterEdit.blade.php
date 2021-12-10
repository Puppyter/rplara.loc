@extends("layouts.layout")
@section('content')
    <form enctype="multipart/form-data" action="{{route('characters.update',['character'=>$character->id])}}" method="get">
        @method('patch')
        @csrf
    <div class="row row-cols-2">
        <div class="col">
            <label>
                Name
                <input type="text" name="name" value="{{$character->name}}">
            </label>
        </div>
        <div class="col">
            <input type="file" id="avatar" name="avatar">
        </div>
    </div>
        <button type="submit" class="btn text-white"  style="margin: 1em;background-color: #61892f">Edit</button>
    </form>
@endsection
@section('sidebar')
    <form action="{{route('characters.destroy',['character'=>$character->id])}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn text-white"  style="margin: 1em;background-color: #61892f">Suicide</button>
    </form>
@endsection
