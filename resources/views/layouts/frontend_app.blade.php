<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>

</head>

<body>
    @yield('app_content')

</body>

</html>
