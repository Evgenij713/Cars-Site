@extends('components.layouts.main')
@section('title', 'Добавить марку автомобиля')
@section('content')
    <x-headerContainer type="simple" h1="Добавить новую марку автомобиля" />

    <form id="brandForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        @include('brands.form')

        <x-buttonGroup class="btn-primary" link="{{ route('brands.index') }}" btnBack="← Назад к списку" btnSubmit="Добавить марку" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
