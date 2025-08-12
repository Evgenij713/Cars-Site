@extends('components.layouts.main')
@section('title', 'Добавить автомобиль')
@section('content')
    <x-headerContainer type="simple" h1="Добавить новый автомобиль" />

    <form id="carForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        @include('cars.form', ['isEdit' => false])

        <x-buttonGroup class="btn-primary" link="{{ route('cars.index') }}" btnBack="← Назад к каталогу" btnSubmit="Добавить автомобиль" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
