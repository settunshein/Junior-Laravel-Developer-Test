<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            $email = 'required|unique:companies,email';
        }else{
            $email = 'required|email|unique:companies,email,' . $this->company->id;
        }

        return [
            'name'    => 'required|string',
            'email'   => $email,
            'logo'    => 'nullable',
            'website' => 'nullable',
        ];
    }
}
