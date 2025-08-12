<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/steering-wheel-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/steering-wheel-16.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/css/auth.css'])
</head>
<body>
<div class="main-container">
    @yield('content')
</div>
@routes
@stack('scripts')
</body>
</html>
