<?php

namespace App\Http\Requests\Front;

use Auth;
use App\Http\Requests\Request;

class UserFrontRegisterFormRequest extends Request
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
            'first_name' => 'required|alpha_spaces|max:80',
            'middle_name' => 'regex:(^[a-zA-Z -]*$)|max:80',
            'last_name' => 'required|alpha_spaces|max:80',
            'email' => 'required|unique:users,email|email|max:100',
            'password' => 'required|confirmed|min:6|max:50',
            'mobile_num'  => 'required|regex:(^09[0-9]*$) |max:50',
            'state_id' => 'required',
            'city_id' => 'required',
            'terms_of_use' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('First Name is required'),
            'middle_name.regex' => __('if middle name is not available, please put "-"'),
            'last_name.required' => __('Last Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('Please provide a valid email address. E.g. jonasblue@mail.com.'),
            'email.unique' => __('This Email has already been taken'),
            'password.required' => __('Password is required'),
            'password.min' => __('The password should be more than 6 characters long'),
            'mobile_num.required' => __('The mobile number should be more than 11 numbers long'),
            'mobile_num.regex' => __('The mobile should start at 09'),
            'state_id.required' => __('Please select your province'),
            'city_id.required' => __('Please select your city'),
            'terms_of_use.required' => __('Please accept terms of use'),
            'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
            'g-recaptcha-response.captcha' => __('Captcha error! try again later or contact site admin'),
        ];
    }

}
