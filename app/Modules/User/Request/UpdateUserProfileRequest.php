<?php

namespace App\Modules\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
        $id = auth()->user()->id;
        return [
            'name' => 'required|string',
            'image' => 'nullable|image',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|string|unique:users,username,' . $id,
            'phone_number' => 'required|numeric|unique:users,phone_number,' . $id,
            'age' => 'required|integer',
            'password' => 'nullable|confirmed',
        ];
    }
}
