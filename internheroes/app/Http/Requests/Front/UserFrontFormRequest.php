<?php

namespace App\Http\Requests\Front;

use Auth;
use App\Http\Requests\Request;

class UserFrontFormRequest extends Request
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
        $id = Auth::user()->id;
        $id_str = ',' . $id;
        $password = '';
        return [
            'first_name' => 'required|alpha_spaces|max:80',
            'middle_name' => 'nullable|alpha_spaces|max:80',
            'last_name' => 'required|alpha_spaces|max:80',
            'email' => 'required|unique:users,email' . $id_str . '|email|max:100',
            'password' => 'max:50',
            'father_name' => 'nullable|alpha_spaces|max:80',
            'date_of_birth' => 'required',
            'gender_id' => 'required',
            'marital_status_id' => 'required',
            'nationality_id' => 'required',
            'national_id_card_number' => 'numeric|nullable',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required|numeric',
            'mobile_num' => ['required','numeric','regex:/^(09)\d{9}$/'],
            /*'job_experience_id' => 'required', */
            'career_level_id' => 'required',
            'industry_id' => 'required',
            /* 'functional_area_id' => 'required', 
            'current_salary' => 'required|numeric',
            'expected_salary' => 'required|numeric',
            'salary_currency' => 'required|max:5',*/
            'street_address' => 'required|max:230',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('First Name is required'),
            'first_name.alpha' => 'First Name must be contain letters only and no special character',
            /* 'middle_name.required' => __('Middle Name is required'), */
            'middle_name.alpha' => 'Middle Name must be contain letters only and no special character',
            'last_name.required' => __('Last Name is required'),
            'last_name.alpha' => 'Last Name must be contain letters only and no special character',
            'email.required' => __('Email is required'),
            'email.email' => __('Please provide a valid email address. E.g. jonasblue@mail.com.'),
            'email.unique' => __('This Email has already been taken'),
            'password.required' => __('Password is required'),
            'password.min' => __('The password should be more than 3 characters long'),
            // 'father_name.required' => __('Father Name is required'),
            // 'father_name.alpha' => "Father's Name must be contain letters only and no special character",
            'date_of_birth.required' => __('Date of birth is required'),
            'date_of_birth.date_format' => __('Invalid date format'),
            'gender_id.required' => __('Please select gender'),
            'marital_status_id.required' => __('Please select marital status'),
            'nationality_id.required' => __('Please select nationality'),
            'national_id_card_number.numeric' => __('National ID must be in number format'),
            'country_id.required' => __('Please select country'),
            'state_id.required' => __('Please select state'),
            'city_id.required' => __('Please select city'),
            'phone.required' => __('Please enter phone number'),
            'phone.numeric' => 'Phone number must be in number format',
            'mobile_num.required' => __('Please enter mobile number'),
            'mobile_num.numeric' => 'Mobile number must be in number format',
            'mobile_num.regex' => 'Mobile number must be start with 09',
            // 'job_experience_id.required' => __('Please select experience'),
            'career_level_id.required' => __('Please select career level'),
            'industry_id.required' => __('Please select industry'),
            // 'functional_area_id.required' => __('Please select functional area'),
            // 'current_salary.required' => __('Please enter current salary'),
            // 'current_salary.numeric' => __('Current salary must not be negative and no alphabet'),
            // 'expected_salary.required' => __('Please enter expected salary'),
            // 'expected_salary.numeric' => __('Expected salary must not be negative and no alphabet'),
            // 'salary_currency.required' => __('Please select salary currency'),
            'street_address.required' => __('Please enter street address'),
            'image.image' => __('Only images can be uploaded'),
        ];
    }

}
