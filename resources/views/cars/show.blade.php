@extends('components.layouts.main')
@section('title', 'Обзор автомобиля')
@section('content')
    <div class="car-detail-card">
        <div class="car-header">
            <div class="car-title" id="carTitle">{{ $car->brand->title }} {{ $car->model }}</div>
            <div class="car-header-price" id="carPrice">{{ $car->price }} руб.</div>
        </div>

        <div class="car-content">
            <div class="car-info">
                <div class="info-section">
                    <div class="info-title">Основная информация</div>
                    @can('viewAll', $car)
                        <div class="info-row">
                            <div class="info-label">Статус:</div>
                            <div class="info-value">
                                <span class="status-badge status-{{ strtolower($car->status->name) }}">
                                    {{ $car->status->text() }}
                                </span>
                            </div>
                        </div>
                    @endcan
                    <div class="info-row">
                        <div class="info-label">Страна:</div>
                        <div class="info-value">{{ $car->brand->country->title }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Марка:</div>
                        <div id="carBrand" class="info-value">{{ $car->brand->title }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Модель:</div>
                        <div id="carModel" class="info-value">{{ $car->model }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Цена:</div>
                        <div class="info-value">{{ $car->price }} руб.</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Трансмиссия:</div>
                        <div class="info-value">
                            <span class="transmission-badge transmission-{{ $car->transmission }}">
                                {{ $transmissions[$car->transmission] }}
                            </span>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">VIN-код:</div>
                        <div class="info-value">{{ $car->vin }}</div>
                    </div>
                    @if($car->tags->isNotEmpty())
                        <div class="info-row">
                            <div class="info-label">Теги:</div>
                            <div class="info-value">
                                <div class="tags-container">
                                    @foreach($car->tags as $tag)
                                        <span class="tag">{{ $tag->title }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Группа кнопок (Назад + Редактировать + Удалить) -->
    <div class="button-group">
        <a href="{{ route('cars.index') }}" class="button back-button">← Вернуться в каталог</a>
        @canany(['update', 'delete'], $car)
            <a href="{{ route('cars.edit', [$car->id]) }}" class="button edit-button">✏️ Редактировать</a>
            @if($car->canDelete)
                <form class="carForm">
                    @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->
                    <input type="hidden" name="id" value="{{ $car->id }}">
                    <button type="submit" class="button delete-button">🗑️ Удалить</button>
                </form>
            @endif
        @endcanany
    </div>

    @canany(['update', 'delete'], $car)
        <!-- Диалог подтверждения удаления -->
        <div class="confirmation-dialog" id="confirmationDialog">
            <div class="dialog-content">
                <h2>Подтверждение удаления</h2>
                <p id="confirmationMessage"></p>
                <div class="dialog-buttons">
                    <button id="cancelButton" class="button back-button">Отмена</button>
                    <button id="confirmDelete" class="button delete-button">Удалить</button>
                </div>
            </div>
        </div>
    @endcanany

    <!-- Комментарии -->
    <x-comments :commentable="$car" />
@endsection
@push('scripts')
    @vite(['resources/js/delete.js', 'resources/js/create.js'])
@endpush
