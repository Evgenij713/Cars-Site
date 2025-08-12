@props([
    'class' => '',
    'link' => '#',
    'btnBack' => '',
    'btnSubmit' => ''
])

<div class="button-group">
    <a href="{{ $link }}" class="btn btn-back">{{ $btnBack }}</a>
    <button type="submit" class="btn {{ $class }}">{{ $btnSubmit }}</button>
</div>
