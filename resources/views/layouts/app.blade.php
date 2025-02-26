<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('components.navbar')

    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>

</html>
