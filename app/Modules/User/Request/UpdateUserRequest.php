<?php

namespace App\Modules\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'image' => 'nullable|image',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'username' => 'required|string|unique:users,username,' . $this->id,
            'phone_number' => 'required|numeric|unique:users,phone_number,' . $this->id,
            'age' => 'required|integer',
            'password' => 'nullable|confirmed',
            'role_id' => 'required|integer',
        ];
    }
}
