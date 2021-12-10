<!DOCTYPE HTML>
<head>

</head>
<body>
    You invited to room: {{$room->name}}
    <a href="{{route('rooms.show',['room' => $room->slug])}}">Accept Invite</a>
    <a href="{{route('invite.decline')}}">decline invite</a>
</body>
