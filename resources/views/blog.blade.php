<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($blogs as $blog )
        <h1>{{$blog->Title}}</h1>
    @endforeach
</body>
</html>