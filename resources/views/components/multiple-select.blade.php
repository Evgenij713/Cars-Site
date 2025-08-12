@props([
    'label',
    'name',
    'options',
    'selectedOptions' => []
])

<div class="form-group">
    <label>{{ $label }}</label>
    <div class="options-container">
        @foreach($options as $id => $option)
            <div class="option-checkbox">
                <input
                    type="checkbox"
                    id="option-{{ $id }}"
                    name="{{ $name }}[]"
                    value="{{ $id }}"
                    @checked(in_array($id, (array)$selectedOptions))
                />
                <label for="option-{{ $id }}">{{ $option }}</label>
            </div>
        @endforeach
    </div>
    <div id="{{ $name }}-error" class="error-message"></div>
</div>
