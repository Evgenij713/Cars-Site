@extends('components.layouts.main')
@section('title', 'Корзина с удаленными автомобилями')
@section('content')
    <div class="header-container">
        <h1 class="page-title">Корзина с удаленными автомобилями</h1>
        <div class="button-group">
            <a href="{{ route('cars.index') }}" class="button btn-back">← Назад к каталогу</a>
        </div>
    </div>
    @if($cars->isEmpty())
        <div class="empty-trash">
            <p>Корзина пуста</p>
        </div>
    @else
        <div class="catalog" id="catalog">
            @foreach($cars as $car)
                <div class="car-card">
                    <div class="car-make">{{ $car->make }}</div>
                    <div class="car-model">{{ $car->model }}</div>
                    <div class="car-vin">{{ $car->vin }}</div>
                    <div class="car-status status-{{ strtolower($car->status->name) }}">
                        <span class="status-label">Статус при удалении:</span>
                        {{ $car->status->text() }}
                    </div>
                    <div class="price-label">Цена:</div>
                    <div class="car-price-card">{{ number_format($car->price, 0, ',', ' ') }} руб.</div>
                    <div class="car-actions">
                        @can('restore', $car)
                            <form class="action-form" data-car-id="{{ $car->id }}">
                                @csrf
                                <button type="submit" class="button btn-restore">Восстановить</button>
                            </form>
                        @endcan
                        @can('forceDelete', $modelCar)
                            <form class="action-form" data-car-id="{{ $car->id }}">
                                @csrf
                                <button type="submit" class="button btn-delete-permanently">Удалить</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Диалог подтверждения удаления -->
    <div class="confirmation-dialog" id="confirmationDialog">
        <div class="dialog-content">
            <h2>Подтверждение удаления</h2>
            <p>Вы уверены, что хотите окончательно удалить этот автомобиль? Это действие нельзя отменить.</p>
            <div class="dialog-buttons">
                <button class="button btn-back" id="cancelDelete">Отмена</button>
                <button class="button delete-button" id="confirmDelete">Удалить</button>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/trash.js'])
@endpush
