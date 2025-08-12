@extends('components.layouts.main')
@section('title', 'Каталог автомобилей')
@section('content')
    <x-headerContainer type="complex" :model="$modelCar" h1="Каталог автомобилей" linkButton="{{ route('cars.create') }}" buttonName="+ Добавить автомобиль" linkBasket="{{ route('cars.trash') }}" />

    @if($cars->isEmpty())
        <div class="empty-list">
            <p>Автомобили отсутствуют</p>
        </div>
    @else
        @can('viewAll', $modelCar)
            <div class="catalog" id="catalog">
                @foreach($cars as $car)
                    <a class="car-card" href="{{ route('cars.show', [$car->id]) }}">
                        <div class="car-status status-{{ strtolower($car->status->name) }}">
                            <span class="status-label">Статус:</span>
                            {{ $car->status->text() }}
                        </div>
                        <div class="car-make">{{ $car->brand->title }}</div>
                        <div class="car-model">{{ $car->model }}</div>
                        <div class="car-country">Страна: {{ $car->brand->country->title }}</div>
                        <div class="price-label">Цена:</div>
                        <div class="car-price-card">{{ number_format($car->price, 0, ',', ' ') }} руб.</div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="catalog" id="catalog">
                @foreach($cars as $car)
                    <a class="car-card" href="{{ route('cars.show', [$car->id]) }}">
                        <div class="car-make">{{ $car->brand->title }}</div>
                        <div class="car-model">{{ $car->model }}</div>
                        <div class="car-country">Страна: {{ $car->brand->country->title }}</div>
                        <div class="price-label">Цена:</div>
                        <div class="car-price-card">{{ number_format($car->price, 0, ',', ' ') }} руб.</div>
                    </a>
                @endforeach
            </div>
        @endcan
    @endif
@endsection
