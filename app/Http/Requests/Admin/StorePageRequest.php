<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title'     => 'required',
            'is_active'        => 'required',
            'description'              => 'required|max:123',
            'icon' => 'required|file|mimes:jpeg,jpg,png,webp',
            'image_1' => 'required|file|mimes:jpeg,jpg,png,webp',
            'title_1' => 'required',
            'description_1' => 'required',
            // 'content'           => 'max:65535',
            // 'meta_title'        => 'required|max:190',
            // 'meta_keywords'     => 'max:65535',
            // 'meta_description'  => 'max:65535'
        ];
    }
    public function messages()
    {
        return [
            'image_1.required'       => 'Please Upload an Image of a card.',
            'title_1.required'       => 'Please add title to the card.',
            'description_1.required'       => 'Please add Description to the card.',
        ];
    }
}
