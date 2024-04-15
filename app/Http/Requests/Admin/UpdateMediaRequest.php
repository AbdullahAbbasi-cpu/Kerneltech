<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaRequest extends FormRequest
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
            'media_types' => 'required',
            'embedded_code' => 'required_if:media_types,2,3',            
        ];
    }

    public function messages()
    {
        return [
            'media_types.required' => 'Please Select Media Types.',
            'image.required_if' => 'The image field is required',
            'image.file' => 'The image must be a file.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, jpg, png, webp.',
            'image.max' => 'The image may not be greater than 5000 kilobytes.',
            'thumbnail.required_if' => 'The thumbnail field is required',
            'thumbnail.file' => 'The thumbnail must be a file.',
            'thumbnail.mimes' => 'The thumbnail must be in one of the following formats: jpeg, jpg, png, webp.',
            'thumbnail.max' => 'The thumbnail may not be greater than 5000 kilobytes.',
            'embedded_code.required_if' => 'Embedded code field is required',
        ];
    }
}
