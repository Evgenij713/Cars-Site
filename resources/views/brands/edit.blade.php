@extends('components.layouts.main')
@section('title', 'Редактирование марки автомобиля')
@section('content')
    <x-headerContainer type="simple" h1="Редактирование марки автомобиля" />

    <form id="brandForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <input type="hidden" name="id" value="{{ $brand->id }}">

        @include('brands.form')

        <x-buttonGroup class="edit-button" link="{{ route('brands.index') }}" btnBack="← Назад к списку" btnSubmit="Сохранить" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/edit.js'])
@endpush
