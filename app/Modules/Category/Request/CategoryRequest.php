<?php

namespace App\Modules\Category\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class CategoryRequest extends FormRequest
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
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'nullable|image',
            'order' => 'required|integer',
            'status' => ['required', Rule::in(0,1)],
        ];
    }
}
