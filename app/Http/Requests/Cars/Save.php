<?php

namespace App\Http\Requests\Cars;

use App\Enums\Cars\Status;
use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Save extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $brandIds = Brand::pluck('id')->toArray();
        $transmissions = config('app-cars.transmissions');

        return [
            'status' => ['sometimes', 'integer', Rule::in(array_column(Status::cases(), 'value'))],
            'brand_id' => ['required', Rule::in($brandIds)],
            'model' => 'required|string|max:256',
            'price' => 'required|digits_between:0,9|multiple_of:1000',
            'transmission' => ['required', Rule::in(array_keys($transmissions))],
            'vin' => ['required', 'string','size:17', Rule::unique('cars')->whereNull('deleted_at')->ignore($this->id)],
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    public function attributes()
    {
        return [
            'brand_id' => 'Марка',
            'model' => 'Модель',
            'price' => 'Цена',
            'transmission' => 'Трансмиссия',
            'vin' => 'VIN-код',
            'tags' => 'Теги',
            'tags.*' => 'Тег'
        ];
    }
}
