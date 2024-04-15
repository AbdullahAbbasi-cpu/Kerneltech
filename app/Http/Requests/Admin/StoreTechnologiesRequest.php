<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologiesRequest extends FormRequest
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
            'image' => 'required|file|mimes:jpeg,jpg,png,webp',
            'is_active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Image must be less than 5 MB.',
        ];
    }

}
