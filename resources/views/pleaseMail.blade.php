<!DOCTYPE HTML>
<head>

</head>
<body>
<a href="{{route('invite.accept',['invite' => $id, "roomCreator" => true])}}">Add to room</a>
<a href="{{route('invite.decline',['invite' =>$id])}}">Decline</a>
</body>
