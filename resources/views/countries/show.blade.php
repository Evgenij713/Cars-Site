@extends('components.layouts.main')
@section('title', 'Просмотр страны')
@section('content')
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о стране</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value">{{ $country->title }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список марок автомобилей -->
        @if($country->brands->count() > 0)
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Марки автомобилей этой страны</h2>
                <div class="list-container">
                    @foreach($country->brands as $brand)
                        <a href="{{ route('brands.show', [$brand->id]) }}" class="list-item brand-link">
                            <div class="brand-title">{{ $brand->title }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="empty-list">
                <p>Для этой страны марки автомобилей не добавлены</p>
            </div>
        @endif

        <!-- Кнопка возврата -->
        <x-backButton link="{{ route('countries.index') }}" buttonName="← Вернуться к списку стран" />
    </div>
@endsection
