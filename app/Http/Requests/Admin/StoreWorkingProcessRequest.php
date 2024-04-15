<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkingProcessRequest extends FormRequest
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
            'heading' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'image_1' => 'required|file|mimes:jpeg,jpg,png,webp,svg',
            'title_1' => 'required',
            'description_1' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image_1.max' => 'Image must be less than 5 MB.',
            'image_2.max' => 'Image must be less than 5 MB.',
            'image_3.max' => 'Image must be less than 5 MB.',
            'image_4.max' => 'Image must be less than 5 MB.',
            'image_5.max' => 'Image must be less than 5 MB.',
            'image_6.max' => 'Image must be less than 5 MB.',
        ];
    }

}
