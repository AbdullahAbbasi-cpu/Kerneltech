<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'title' => 'required',
            // 'description' => 'required',
            'is_active' => 'required',
            'page_to_show_slider_on' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'The Updation of Image field is required',
        ];
    }
}