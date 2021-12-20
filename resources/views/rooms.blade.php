@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <rooms :rooms="{{$rooms}}"></rooms>
@endsection
<script>
    var Laravel = {
        'csrfToken' : '{{csrf_token()}}'
    };
</script>
