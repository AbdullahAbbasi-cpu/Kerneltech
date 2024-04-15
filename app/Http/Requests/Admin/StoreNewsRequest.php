<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'Homeimage' => 'required_if:homePage,1|image|mimes:jpeg,png,jpg,gif,webp',
            'image' => 'required|file|mimes:jpeg,jpg,png,webp',
            'news_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Homeimage.required_if' => 'The Home image field is required when the Front Page checkbox is checked.',
            'Homeimage.max' => 'Image must be less than 5 MB.',
            'image.max' => 'Image must be less than 5 MB.',
        ];
    }

}
