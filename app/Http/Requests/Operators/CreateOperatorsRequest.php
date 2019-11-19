<?php

namespace App\Http\Requests\Operators;

use Illuminate\Foundation\Http\FormRequest;

class CreateOperatorsRequest extends FormRequest
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
            'name' => 'required|string',
            'user_id'=>'required|exists:users,id',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'phone' => 'required|string',
            'email' => 'nullable|unique:operators,email|email',
            'address' => 'nullable|string',
        ];
    }
    /**
     * Custom messages
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Operator business owner is required',
            'user_id.exists' => 'User is not valid',
        ];
    }
}
