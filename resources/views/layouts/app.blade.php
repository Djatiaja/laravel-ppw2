<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello world!</title>

</head>
    <body>

@include('layouts.nav')

<main>
    @yield('content')
</main>                 

@include('layouts.footer')

    </body>
</html>