<?php

namespace App\Modules\Course\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class CourseRequest extends FormRequest
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
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image',
            'order' => 'required|integer',
            'price' => 'required|integer',
            'success_grade' => 'required|integer',
            'teacher_id' => 'required|integer',
            'category_id' => 'required|integer',
            'icon' => 'nullable|string',
            'status' => ['required', Rule::in(0,1)],
            'feature' => ['required', Rule::in(0,1)],
            'new' => ['required', Rule::in(0,1)],
            'certificate' => ['required', Rule::in(0,1)],
        ];
    }
}
