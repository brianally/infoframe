<?php

namespace App\Http\Requests;

use App\Http\Requests\UserRequest;

class UserCreateRequest extends UserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
          'password' => 'required|min:6|confirmed'
        ]);
    }
}
