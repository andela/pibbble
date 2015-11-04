<?php

namespace Pibbble\Http\Requests;

class ProfileRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'min:2',
            'username' => 'required|unique:users|min:2',
            'email' => 'required|unique:users|min:2',
            'url' => 'min:2',
            'location' => 'min:2',
            'bio' => 'min:2'
        ];
    }
}
