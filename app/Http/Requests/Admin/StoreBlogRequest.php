<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'featured_image' => 'required|file|mimes:jpeg,jpg,png,webp|max:5120',
            'author_picture' => 'required|file|mimes:jpeg,jpg,png,webp|max:5120',
            'author_name' => 'required',
            'author_description' => 'required',
            'description' => 'required',
            'category' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'featured_image.max' => 'Image must be less than 5 MB.',
            'author_picture.max' => 'Image must be less than 5 MB.',
        ];
    }
}