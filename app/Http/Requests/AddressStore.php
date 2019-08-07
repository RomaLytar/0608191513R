<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStore extends FormRequest
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
            'name' => 'required',
            'city' => 'required',
            'area' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name required',
            'city.required' => 'City required',
            'area.required' => 'Area required',
        ];
    }
}
