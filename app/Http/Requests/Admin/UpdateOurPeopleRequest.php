<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurPeopleRequest extends FormRequest
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
            'our_people_title' => 'required',
            'our_people_sub_title' => 'required',
            'our_people_date' => 'required|date',
            'image_input' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image_input.required' => 'The image field is required',
        ];
    }
}
