<?php

namespace App\Http\Requests\Comments;

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
        return [
            'body' => 'required|string|max:80',
            'commentable_id' => [
                'required',
                'integer',
                Rule::when(
                    // Если commentable_type присутствует в списке разрешенных таблиц, то
                    in_array($this->input('commentable_type'), config('commentable')),
                    // проверяем существование записи с таким id в указанной таблице
                    Rule::exists($this->input('commentable_type'), 'id')
                )
            ],
            'commentable_type' => [
                'required',
                'string',
                Rule::in(config('commentable')) // Разрешаем только указанные таблицы
            ]
        ];
    }

    public function attributes()
    {
        return [
            'body' => 'Комментарий',
            'commentable_id' => 'id комментируемой таблицы',
            'commentable_type' => 'Комментируемая таблица'
        ];
    }
}
