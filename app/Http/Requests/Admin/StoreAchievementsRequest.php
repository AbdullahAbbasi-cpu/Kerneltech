<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementsRequest extends FormRequest
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
            'counter' => 'required',
            'icon' => 'required|file|mimes:jpeg,jpg,png,webp',
            'is_active' => 'required',
            'icon_text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'icon.max' => 'Image must be less than 5 MB.',
        ];
    }

}
