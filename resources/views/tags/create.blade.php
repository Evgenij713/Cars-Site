@extends('components.layouts.main')
@section('title', 'Добавить тег')
@section('content')
    <x-headerContainer type="simple" h1="Добавить новый тег" />

    <form id="tagForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <x-input label="Название" name="title" type="text" placeholder="Например: Красная цена" />

        <x-buttonGroup class="btn-primary" link="{{ route('tags.index') }}" btnBack="← Назад к списку" btnSubmit="Добавить тег" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
