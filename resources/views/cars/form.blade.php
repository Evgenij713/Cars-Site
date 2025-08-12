@if($isEdit)
    @can('updateStatus', $car)
        <x-select
            label="Статус"
            name="status"
            :options="collect($statuses)->pluck('text', 'value')"
            selected-value="{{ $car->status ?? '' }}"
        />
    @endcan
@endif

<x-select label="Марка автомобиля" name="brand_id" :options="$brands" selected-value="{{ $car->brand_id ?? '' }}" />
<x-input label="Модель автомобиля" name="model" type="text" placeholder="Например: Camry" default-value="{{ $car->model ?? '' }}" />
<x-input label="Цена (руб.)" name="price" type="number" placeholder="Например: 2500000" min="0" default-value="{{ $car->price ?? '' }}" />
<x-select label="Трансмиссия" name="transmission" :options="$transmissions" selected-value="{{ $car->transmission ?? '' }}" />
<x-input label="VIN-код (17 символов)" name="vin" type="text" placeholder="Например: XTA21099999999999" maxlength="17" default-value="{{ $car->vin ?? '' }}" />
@isset($tags)
    <x-multiple-select label="Теги" name="tags" :options="$tags" :selectedOptions="$selectedTags ?? []" />
@endisset
