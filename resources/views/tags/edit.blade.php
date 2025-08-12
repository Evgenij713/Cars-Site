@extends('components.layouts.main')
@section('title', 'Редактирование тега')
@section('content')
    <x-headerContainer type="simple" h1="Редактирование тега" />

    <form id="tagForm">
        @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <input type="hidden" name="id" value="{{ $tag->id }}">

        <x-input label="Название" name="title" type="text" placeholder="Например: Красная цена" default-value="{{ $tag->title ?? '' }}" />

        <x-buttonGroup class="edit-button" link="{{ route('tags.index') }}" btnBack="← Назад к списку" btnSubmit="Сохранить" />
    </form>
@endsection
@push('scripts')
    @vite(['resources/js/edit.js'])
@endpush
