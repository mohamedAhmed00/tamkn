<?php

namespace App\Modules\Answer\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class AnswerRequest extends FormRequest
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
            'answer_en' => 'required|string',
            'answer_ar' => 'required|string',
            'order' => 'required|integer',
            'status' => ['required', Rule::in(0,1)],
            'is_correct' => ['nullable', Rule::in(0,1)],
        ];
    }
}
