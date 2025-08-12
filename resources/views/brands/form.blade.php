<x-select label="Страна" name="country_id" :options="$countries" selected-value="{{ $brand->country_id ?? '' }}" />
<x-input label="Название" name="title" type="text" placeholder="Например: Mercedes Benz" default-value="{{ $brand->title ?? '' }}" />
