<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreOurPeopleRequest extends FormRequest
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
            'image' => 'required|file|mimes:jpeg,jpg,png,webp',
            'our_people_date' => 'required|date',
        ];
    }
}
