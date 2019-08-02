<?php

namespace App\Modules\Lesson\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class LessonRequest extends FormRequest
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
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'sound_en' => 'required|file',
            'sound_ar' => 'required|file',
            'video_en' => 'required|mimetypes:video/avi,video/mp4,video/quicktime',
            'video_ar' => 'required|mimetypes:video/avi,video/mp4,video/quicktime',
            'order' => 'required|integer',
            'status' => ['required', Rule::in(0,1)],
        ];
    }
}
