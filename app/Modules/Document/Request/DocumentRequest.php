<?php

namespace App\Modules\Document\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class DocumentRequest extends FormRequest
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
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'file_en' => 'required|file',
            'file_ar' => 'required|file',
            'order' => 'required|integer',
            'status' => ['required', Rule::in(0,1)],
        ];
    }
}
