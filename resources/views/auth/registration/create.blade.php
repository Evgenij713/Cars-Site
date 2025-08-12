@extends('components.layouts.auth')
@section('title', 'Регистрация')
@section('content')
    <div class="header-container">
        <h1 for-registration>Регистрация</h1>
    </div>
    <form id="registrationForm" class="auth-form">
        @csrf
        <x-input label="Имя" name="name" type="text" placeholder="Введите ваше имя" />
        <x-input label="Email" name="email" type="email" placeholder="example@mail.com" />

        <div class="password-fields">
            <x-input label="Пароль" name="password" type="password" placeholder="Не менее 8 символов" />
            <x-input
                label="Подтвердите пароль"
                name="password_confirmation"
                type="password"
                placeholder="Повторите пароль"
                class="password-confirm"
            />
        </div>

        <div class="button-group register-buttons">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="{{ url()->previous() === url()->current() ? route('home') : url()->previous() }}"
               class="btn btn-back">
                Назад
            </a>
        </div>

        <div class="auth-links register-links">
            Уже есть аккаунт?
            <a href="{{ route('login.index') }}" class="auth-link">Войти</a>
        </div>
    </form>
@endsection

@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
