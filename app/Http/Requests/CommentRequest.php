<?php

namespace Pibbble\Http\Requests;

use Pibbble\Http\Requests\Request;

class CommentRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'comment' => 'required',
        ];
    }
}
