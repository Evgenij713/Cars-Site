@extends('components.layouts.main')
@section('title', 'Редактирование данных автомобиля')
@section('content')
    <x-headerContainer type="simple" h1="Редактирование данных автомобиля" />

    <form id="carForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <input type="hidden" name="id" value="{{ $car->id }}">

        @include('cars.form', ['isEdit' => true])

        <x-buttonGroup class="edit-button" link="{{ route('cars.index') }}" btnBack="← Назад к каталогу" btnSubmit="Сохранить" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/edit.js'])
@endpush
