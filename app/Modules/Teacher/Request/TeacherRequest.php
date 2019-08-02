<?php

namespace App\Modules\Teacher\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
            'job' => 'nullable|string',
            'email' => 'nullable|string|unique:teachers,email,' . $this->id,
            'phone_number' => 'nullable|unique:teachers,phone_number,' . $this->id,
            'address' => 'nullable|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'cv_description' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'study_description' => 'nullable|string',
            'order' => 'required|integer',
            'status' => ['required',
                Rule::in([0, 1]),
            ],
            'image' => 'nullable|image'
        ];
    }
}
