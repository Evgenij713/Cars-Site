@extends('components.layouts.auth')
@section('title', 'Авторизация')
@section('content')
    <div class="header-container">
        <h1>Авторизация</h1>
    </div>
    <form id="authForm">
        @csrf
        <x-input label="Email" name="email" type="text" />
        <x-input label="Пароль" name="password" type="password" />
        <x-input label="Запомнить" name="remember" type="checkbox" />
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="{{ url()->previous() === url()->current() ? route('home') : url()->previous() }}" class="btn btn-back">Назад</a>
        </div>
        <div class="auth-links">
            Нет учетной записи? <a href="{{ route('registration.index') }}" class="auth-link">Зарегистрируйтесь</a>
        </div>
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
