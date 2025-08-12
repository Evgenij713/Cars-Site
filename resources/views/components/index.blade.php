@props([
    'data' => collect(), // По умолчанию пустая коллекция
    'model' => collect(), // По умолчанию пустая коллекция
    'emptyList' => '',
    'routeCardTitleLink' => '',
    'routeEditButton' => '',
    'formClassName' => ''
])
@if ($data->isEmpty())
    <div class="empty-list">
        <p>{{ $emptyList }}</p>
    </div>
@else
    @canany(['update', 'delete'], $model)
        <div class="list" id="list">
            @foreach($data as $element)
                <div class="card item">
                    <div class="card-title"><a class="card-title-link" href="{{ route($routeCardTitleLink, $element->id) }}">{{ $element->title }}</a></div>
                    <div class="card-actions">
                        <a class="button edit-button" href="{{ route($routeEditButton, $element->id) }}">✏️ Редактировать</a>
                        <form class="{{ $formClassName }}">
                            @csrf <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->
                            <input type="hidden" name="id" value="{{ $element->id }}">
                            <button type="submit" class="button delete-button">🗑️ Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="list" id="list">
            @foreach($data as $element)
                <div class="card item">
                    <div class="card-title"><a class="card-title-link" href="{{ route($routeCardTitleLink, $element->id) }}">{{ $element->title }}</a></div>
                </div>
            @endforeach
        </div>
    @endcanany
@endif

<!-- Диалог подтверждения удаления -->
<div class="confirmation-dialog" id="confirmationDialog">
    <div class="dialog-content">
        <h2>Подтверждение удаления</h2>
        <p id="confirmationMessage"></p>
        <div class="dialog-buttons">
            <button id="cancelDelete" class="button btn-back">Отмена</button>
            <button id="confirmDelete" class="button delete-button">Удалить</button>
        </div>
    </div>
</div>
