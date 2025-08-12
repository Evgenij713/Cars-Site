@props([
    'type' => 'complex',  // 'simple' или 'complex',
    'h1' => '',
    'model' => collect(), // По умолчанию пустая коллекция
    'linkButton' => '#',
    'buttonName'  => '',
    'linkBasket' => '#'
])

@if ($type === 'simple')
    <div class="header-container">
        <h1>{{ $h1 }}</h1>
    </div>
@else
    <div class="header-container">
        <h1 class="page-title">{{ $h1 }}</h1>
        @can('create', $model)
            <div class="header-buttons">
                <a href="{{ $linkButton }}" class="button btn-primary">{{ $buttonName }}</a>
                @if ($linkBasket !== '#')
                    <a href="{{ $linkBasket }}" class="button btn-trash">🗑️ Корзина</a>
                @endif
            </div>
        @endcan
    </div>
@endif
