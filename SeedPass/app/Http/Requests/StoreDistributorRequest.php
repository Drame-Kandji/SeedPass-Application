<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistributorRequest extends FormRequest
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
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'cni' => 'required|integer',
            'email' => 'required|email',
            'organisation' => 'string',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'identificationNumber' => 'string',
            'password' => 'required|string|min:8',
            'isAcceptedCondition' => 'required|boolean',
            'isAcceptedBiometric' => 'required|boolean',

        ];
    }
}
