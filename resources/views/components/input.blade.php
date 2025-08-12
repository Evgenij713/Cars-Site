@props([
    'label',
    'name',
    'type',
    'placeholder' => '',
    'defaultValue' => '',
    'min' => '',
    'maxlength' => ''
])

@if ($type === 'checkbox')
    <div class="form-group checkbox-group">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            min="{{ $min }}"
            maxlength="{{ $maxlength }}"
            placeholder="{{ $placeholder }}"
        />
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
@else
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            min="{{ $min }}"
            maxlength="{{ $maxlength }}"
            placeholder="{{ $placeholder }}"
            value="{{ $defaultValue }}"
        />
        <div id="{{ $name }}-error" class="error-message"></div>
    </div>
@endif
