<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileProjectFormRequest extends Request
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

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {
                    $id = (int) $this->input('id', 0);
                    $id_str = ($id > 0) ? ','.$id : '';
                    return [
                        "name" => "required|alpha_spaces",
                        //"image" => "required",
                        "url" => "nullable|regex:".$regex,
                        "date_start" => "required",
                        "date_end" => "required_if:is_on_going,0",
                        "is_on_going" => "required",
                        "description" => "required|max:300",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter project name.',
            'name.alpha' => 'Please enter only valid character. No special character',
            'image.required' => 'Only images can be uploaded.',
            'url.required' => 'Please enter project URL.',
            'url.regex' => 'Please enter valid project URL (E.g. https://domain.com)',
            'date_start.required' => 'Please set start date.',
            'date_end.required_if' => 'Please set end date.',
            'is_on_going.required' => 'Is this project ongoing?',
            'description.required' => 'Please enter Profile Description with the maximum of 300 characters.',
        ];
    }

}
