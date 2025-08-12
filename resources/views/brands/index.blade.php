@extends('components.layouts.main')
@section('title', 'Список марок автомобилей')
@section('content')
    <x-headerContainer type="complex" :model="$modelBrand" h1="Список марок автомобилей" linkButton="{{ route('brands.create') }}" buttonName="+ Добавить марку" />
    <x-index
        :data="$brands"
        :model="$modelBrand"
        emptyList="Марки автомобилей отсутствуют"
        routeCardTitleLink="brands.show"
        routeEditButton="brands.edit"
        formClassName="brandForm"
    />
@endsection
@push('scripts')
    @vite(['resources/js/delete.js'])
@endpush
