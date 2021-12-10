@extends('layouts.layout')
@section('content')
    <form action="{{route('users.update',[$id])}}" enctype="multipart/form-data" method="post">
        @method("PUT")
        @csrf
        <input type="file" name="avatar" accept="image/*">
        <div class="input-group flex-nowrap">
            <input required type="text" class="form-control" placeholder="User name"
                   aria-describedby="addon-wrapping" value="{{$name}}" name="name">
        </div>
        <button type="submit" name="id" class="btn btn-dark" value="{{$id}}">Edit information</button>
    </form>
@endsection
