<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>

<nav>
    <a href="/" wire:navigate
            @class([ 'current' => request()->is('/') ])
    >Todos</a>
    <a href="/counter" wire:navigate@class([ 'current' => request()->is('counter') ])>Counter</a>
</nav>

{{ $slot }}

</body>
</html>
