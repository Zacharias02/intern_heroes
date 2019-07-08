<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class UserFormRequest extends Request
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
        $id = (int) $this->input('id', 0);
        $password = 'required|min:6';
        $id_str = '';
        if ($id > 0) {
            $id_str = ',' . $id;
            $password = '';
        }
        return [
            'first_name' => 'required|alpha_spaces|max:80',
            'middle_name' => 'nullable|regex:/[a-zA-Z0-9\/]/|max:80',
            'last_name' => 'required|alpha_spaces|max:80',
            'email' => 'required|unique:users,email' . $id_str . '|email|max:100',
            'password' => $password,
            /* 'father_name' => 'required|alpha|max:80', */
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
            'job_experience_id' => 'required',
            'career_level_id' => 'required',
            'industry_id' => 'required',
            /* 'functional_area_id' => 'required', */
            'current_salary' => 'required|numeric',
            'expected_salary' => 'required|numeric',
            'salary_currency' => 'required|max:5',
            'street_address' => 'required|max:230',
            'image' => 'image',
        ];
        /* return [
            'first_name' => 'required|alpha',
            //'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email' . $id_str . '|email',
            'password' => $password,
            'father_name' => 'required',
            'date_of_birth' => 'required',
            'gender_id' => 'required',
            'marital_status_id' => 'required',
            'nationality_id' => 'required',
            // 'national_id_card_number' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'mobile_num' => 'required',
            'job_experience_id' => 'required',
            'career_level_id' => 'required',
            'industry_id' => 'required',
            'functional_area_id' => 'required',
            'current_salary' => 'required',
            'expected_salary' => 'required',
            'salary_currency' => 'required',
            'street_address' => 'required',
            'image' => 'image',
        ]; */
    }

    public function messages()
    {
        return [
            'first_name.required' => __('First Name is required'),
            'first_name.alpha_spaces' => 'First Name must be contain letters only and no special character',
            /* 'middle_name.required' => __('Middle Name is required, Please put N/A if not applicable'), */
            'middle_name.regex' => 'Middle Name must be contain letters only and no special character',
            'last_name.required' => __('Last Name is required'),
            'last_name.alpha_spaces' => 'Last Name must be contain letters only and no special character',
            'email.required' => __('Email is required'),
            'email.email' => 'Please provide a valid email address. E.g. jonasblue@mail.com.',
            'email.unique' => __('This Email has already been taken'),
            'password.required' => __('Password is required'),
            'password.min' => __('The password should be more than 3 characters long'),
/*          'father_name.required' => __('Father Name is required'),
            'father_name.alpha' => "Father's Name must be contain letters only and no special character", */
            'date_of_birth.required' => __('Date of birth is required'),
            'date_of_birth.date_format' => __('Invalid date format'),
            'gender_id.required' => __('Please select gender'),
            'marital_status_id.required' => __('Please select marital status'),
            'nationality_id.required' => __('Please select nationality'),
            'national_id_card_number.numeric' => __('National ID must be in number format'),
            'country_id.required' => __('Please select country'),
            'state_id.required' => __('Please select provice'),
            'city_id.required' => __('Please select city'),
            'phone.required' => __('Please enter phone number'),
            'phone.numeric' => 'Phone number must be in number format',
            'mobile_num.required' => __('Please enter mobile number'),
            'mobile_num.numeric' => 'Mobile number must be in number format',
            'mobile_num.regex' => 'Mobile number should be 11 digits and it must start with 09',
            'job_experience_id.required' => __('Please select experience'),
            'career_level_id.required' => __('Please select career level'),
            'industry_id.required' => __('Please select industry'),
            // 'functional_area_id.required' => __('Please select functional area'),
            'current_salary.required' => __('Please enter current salary'),
            'current_salary.numeric' => __('Current salary must not be negative and no alphabet'),
            'expected_salary.required' => __('Please enter expected salary'),
            'expected_salary.numeric' => __('Expected salary must not be negative and no alphabet'),
            'salary_currency.required' => __('Please select salary currency'),
            'street_address.required' => __('Please enter street address'),
            'image.image' => __('Only images can be uploaded'),
        ];
       /*  return [
            'first_name.required' => 'First Name is required',
            'first_name.alpha' => 'No special character',
            'middle_name.required' => 'Middle Name is required',
            'last_name.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address. E.g. jonasblue@mail.com.',
            'email.unique' => 'This Email has already been taken.',
            'password.required' => 'Password is required',
            'password.min' => 'The password should be more than 3 characters long.',
            'father_name.required' => 'Father Name is required',
            'date_of_birth.required' => 'Date of birth is required',
            'gender_id.required' => 'Please select gender',
            'marital_status_id.required' => 'Please select marital status',
            // 'nationality_id.required' => 'Please select nationality',
            'national_id_card_number.required' => 'national ID card# required',
            'country_id.required' => 'Please select country',
            'state_id.required' => 'Please select state',
            'city_id.required' => 'Please select city',
            'phone.required' => 'Please enter phone',
            'mobile_num.required' => 'Please enter mobile number',
            'job_experience_id.required' => 'Please select experience',
            'career_level_id.required' => 'Please select career level',
            'industry_id.required' => 'Please select industry',
            'functional_area_id.required' => 'Please select functional area',
            'current_salary.required' => 'Please enter current salary',
            'expected_salary.required' => 'Please enter expected salary',
            'salary_currency.required' => 'Please select salary currency',
            'street_address.required' => 'Please enter street address',
            'image.image' => 'Only images can be uploaded.',
        ]; */
    }

}
