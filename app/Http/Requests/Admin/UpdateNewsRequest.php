<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'news_title' => 'required',
            'news_sub_title' => 'required',
            'news_date' => 'required',
            'image_input' => 'required',
            'home_image_input' => 'required_if:homePage,1',
        ];
    }

    public function messages()
    {
        return [
            'image_input.required' => 'The image field is required',
            'home_image_input.required_if' => 'The image field is required when the Front Page checkbox is checked.',
        ];
    }
}