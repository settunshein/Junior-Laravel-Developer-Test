<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() != 'PATCH') {
            $email    = 'required|unique:users,email';
            $password = 'required';
        }else{
            $email    = 'required|email|unique:users,email,' . $this->user->id;
            $password = 'nullable';
        }

        return [
            'company_id' => 'required',
            'name'       => 'required',
            'email'      => $email,
            'phone'      => 'nullable',
            'avatar'     => 'nullable',
            'role'       => 'required',
            'password'   => $password,
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Company field is required.'
        ];
    }
}
