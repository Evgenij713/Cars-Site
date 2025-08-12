@props([
    'label',
    'name',
    'options',
    'selectedValue' => ''
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        <option disabled selected value> -- выберите нужный вариант -- </option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @selected($errors->any() ? old($name) == $key : $selectedValue == $key)>
                {{ $value }}
            </option>
        @endforeach
    </select>
    <div id="{{ $name }}-error" class="error-message"></div>
</div>
