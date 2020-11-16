<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CustomerValidate extends FormRequest
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
            'name' => 'required|max:255|min:6',
            'email' => 'regex:/^.+@.+$/i|required|min:12',
            'address' => 'required',
        ];
    }
}
