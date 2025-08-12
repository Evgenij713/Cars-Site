<?php

namespace App\Http\Requests\Brands;

use App\Models\Country;
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
        $countryIds = Country::pluck('id')->toArray();

        return [
            'title' => ['required', 'string','max:255', Rule::unique('brands')->ignore($this->id)],
            'country_id' => ['required', Rule::in($countryIds)]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'country_id' => 'Страна'
        ];
    }
}
