<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/steering-wheel-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/steering-wheel-16.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite([
    'resources/css/app.css',
    'resources/css/cars.css'
    ])
</head>
<body>
<div class="main-container">

    <nav class="main-nav">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link @if(request()->routeIs('home')) active @endif">
                    @icon('house') Главная
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cars.index') }}" class="nav-link @if(request()->routeIs('cars.*')) active @endif">
                    @icon('car-side') Автомобили
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('brands.index') }}" class="nav-link @if(request()->routeIs('brands.*')) active @endif">
                    @icon('star') Марки
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('countries.index') }}" class="nav-link @if(request()->routeIs('countries.*')) active @endif">
                    @icon('globe') Страны
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags.index') }}" class="nav-link @if(request()->routeIs('tags.*')) active @endif">
                    @icon('hashtag') Теги
                </a>
            </li>
        </ul>

        <div class="user-auth-section">
            @auth
                <div class="user-info" style="display: flex; align-items: center;">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <div class="user-roles">
                        @foreach(Auth::user()->roles as $role)
                            <div class="user-role-icon">
                                @icon('key')
                                <span class="user-role-tooltip">{{ $role->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form id="logoutForm" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-link">@icon('from-bracket') Выход</button>
                </form>
            @else
                <a href="{{ route('login.index') }}" class="login-link">@icon('to-bracket') Вход</a>
            @endauth
        </div>
    </nav>

    <x-notifications />

    @yield('content')
</div>
@routes
@auth
    @vite(['resources/js/logout.js'])
@endauth
@vite(['resources/js/flash.js'])
@stack('scripts')
</body>
</html>
