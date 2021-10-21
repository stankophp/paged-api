<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:2', 'max:100',],
            'description' => ['required', 'min:2', 'max:100000',],
            'location' => ['required', 'min:2', 'max:100',],
            'salary' => ['required', 'min:2', 'max:100000', 'numeric'],
        ];
    }
}
