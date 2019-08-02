<?php

namespace App\Modules\Language\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string',
            'key' => 'required|string',
            'dir' => [
                'required',
                Rule::in(['rtl', 'ltr']),
            ],
            'default' => ['nullable',Rule::in([0, 1])]
        ];
    }
}
