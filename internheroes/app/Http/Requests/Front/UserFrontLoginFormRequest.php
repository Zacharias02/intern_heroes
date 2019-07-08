<?php

namespace App\Http\Requests\Front;

use Auth;
use App\Http\Requests\Request;

class UserFrontLoginFormRequest extends Request
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
            'email' => 'required|email|exists:users,email|max:100',
            'password' => 'required|min:6|max:50',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('Email is required'),
            'email.email' => __('Please provide a valid email address. E.g. jonasblue@mail.com.'),
            'email.exists' => __('These credentials do not match our records.'),
            'password.required' => __('Password is required'),
            'password.min' => __('The password should be more than 3 characters long'),
        ];
    }

}
