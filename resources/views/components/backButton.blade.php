<!-- Кнопка возврата -->
@props([
    'link' => '#',
    'buttonName' => ''
])

<div class="card-back-button">
    <a href="{{ $link }}" class="button back-button">{{ $buttonName }}</a>
</div>
