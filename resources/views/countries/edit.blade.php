@extends('components.layouts.main')
@section('title', 'Редактирование страны')
@section('content')
    <x-headerContainer type="simple" h1="Редактирование страны" />

    <form id="countryForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <input type="hidden" name="id" value="{{ $country->id }}">

        <x-input label="Название" name="title" type="text" placeholder="Например: Италия" default-value="{{ $country->title ?? '' }}" />

        <x-buttonGroup class="edit-button" link="{{ route('countries.index') }}" btnBack="← Назад к списку" btnSubmit="Сохранить" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/edit.js'])
@endpush
