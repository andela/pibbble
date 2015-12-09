<?php

namespace Pibbble\Http\Requests;

class ProfileRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    /**
     * validation rules for profile request
     * @return array an array containing the validation rules for fields
     */
    public function rules()
    {
        return [
            'name' => 'min:2',
            'username' => 'required|unique:users|min:2',
            'email' => 'required|unique:users|min:2',
            'url' => 'min:2',
            'location' => 'min:2',
            'bio' => 'min:2',
        ];
    }
}
