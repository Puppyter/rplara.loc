<!DOCTYPE HTML>
<head>

</head>
<body>
    <a href="{{route('invite.accept',['invite' => $id, 'roomCreator' => false])}}">Accept Invite</a>
    <a href="{{route('invite.decline',['invite' =>$id])}}">decline invite</a>
</body>
