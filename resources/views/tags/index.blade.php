@extends('components.layouts.main')
@section('title', 'Список тегов')
@section('content')
    <x-headerContainer type="complex" :model="$modelTag" h1="Список тегов" linkButton="{{ route('tags.create') }}" buttonName="+ Добавить тег" />
    <x-index
        :data="$tags"
        :model="$modelTag"
        emptyList="Теги отсутствуют"
        routeCardTitleLink="tags.show"
        routeEditButton="tags.edit"
        formClassName="tagForm"
    />
@endsection
@push('scripts')
    @vite(['resources/js/delete.js'])
@endpush
