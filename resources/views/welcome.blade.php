<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.navbar')
    <h1 class="text-3xl font-bold ">
        Hello world!
    </h1>
    @if (auth()->check())
        <div>
            {{ auth()->user()->name }}
            {{ auth()->user()->email }}
        </div>
    @else
        <div>
            you must login
        </div>
    @endif

</body>

</html>
