@extends('components.layouts.main')
@section('title', 'Просмотр марки автомобиля')
@section('content')
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о марке автомобиля</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Страна:</span>
                        <span class="card-info-value">{{ $brand->country->title }}</span>
                    </div>
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value">{{ $brand->title }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список автомобилей -->
        @if($brand->cars->count() > 0)
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Автомобили этой марки</h2>
                <div class="list-container">
                    @foreach($brand->cars as $car)
                        <a href="{{ route('cars.show', [$car->id]) }}" class="list-item car-link">
                            <div class="car-model">{{ $car->model }}</div>
                            <div class="car-vin">{{ $car->vin }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="empty-list">
                <p>Для этой марки автомобилей пока нет</p>
            </div>
        @endif

        <!-- Кнопка возврата -->
        <x-backButton link="{{ route('brands.index') }}" buttonName="← Вернуться к списку марок автомобилей" />

        <!-- Комментарии -->
        <x-comments :commentable="$brand" />
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/create.js'])
@endpush
