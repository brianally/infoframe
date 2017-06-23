<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
          'name'  => 'required',
          'email' => 'required|email'
        ];

        $isPost = ( !is_null($this->method) && $this->method === 'POST' )
            || $this->server->get('REQUEST_METHOD') === 'POST';

        if ( $isPost ) {
          $rules['password'] = 'required|min:6|confirmed';
        }

        return $rules;
    }
}
