@extends('components.layouts.main')
@section('title', 'Добавить страну')
@section('content')
    <x-headerContainer type="simple" h1="Добавить новую страну" />

    <form id="countryForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <x-input label="Название" name="title" type="text" placeholder="Например: Италия" />

        <x-buttonGroup class="btn-primary" link="{{ route('countries.index') }}" btnBack="← Назад к списку" btnSubmit="Добавить страну" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
