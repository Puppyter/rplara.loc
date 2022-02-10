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
    <div class="row row-cols-2">
        <div class="col">
            @if($character == null)
                <character-create  :metiers="{{$metiers}}" route="{{route('characters.store')}}"></character-create>
            @else
                <character :character="{{$character}}"></character>
            @endif
        </div>
    </div>
@endsection
@section('sidebar')
    <chat></chat>
@endsection
<script>
    var Laravel = {
        'csrfToken' : '{{csrf_token()}}'
    };
</script>
