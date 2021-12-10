<!doctype HTML>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>RPlara</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{route('users.show',['user' => Auth::id()])}}">Back to User page</a>
        </div>
    </div>
</div>
@yield('content')

</body>
