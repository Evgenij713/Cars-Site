@extends('components.layouts.main')
@section('title', 'Список стран')
@section('content')
    <x-headerContainer type="complex" :model="$modelCountry" h1="Список стран" linkButton="{{ route('countries.create') }}" buttonName="+ Добавить страну" />
    <x-index
        :data="$countries"
        :model="$modelCountry"
        emptyList="Страны отсутствуют"
        routeCardTitleLink="countries.show"
        routeEditButton="countries.edit"
        formClassName="countryForm"
    />
@endsection
@push('scripts')
    @vite(['resources/js/delete.js'])
@endpush
