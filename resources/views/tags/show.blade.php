@extends('components.layouts.main')
@section('title', 'Просмотр тега')
@section('content')
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о теге</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value">{{ $tag->title }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список автомобилей -->
        @if($tag->cars->count() > 0)
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Автомобили этого тега</h2>
                <div class="list-container">
                    @foreach($tag->cars as $car)
                        <a href="{{ route('cars.show', [$car->id]) }}" class="list-item car-link">
                            <div class="car-model">{{ $car->model }}</div>
                            <div class="car-vin">{{ $car->vin }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="empty-list">
                <p>У этого тега автомобилей пока нет</p>
            </div>
        @endif

        <!-- Кнопка возврата -->
        <x-backButton link="{{ route('tags.index') }}" buttonName="← Вернуться к списку тегов" />
    </div>
@endsection
