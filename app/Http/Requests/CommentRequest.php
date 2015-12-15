<?php

namespace Pibbble\Http\Requests;

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
