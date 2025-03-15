<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductorRequest extends FormRequest
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
            'email' => 'required|email|unique:productors',
            'organisation' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'identificationNumber' => 'required|string',
            'password' => 'required|string|min:8',
            'isAcceptedCondition' => 'required|boolean',
            'isAcceptedBiometric' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'Le prénom est requis.',
            'lastName.required' => 'Le nom est requis.',
            'cni.required' => 'Le CNI est requis.',
            'email.required' => 'L\'email est requis.',
            'email.unique' => 'L\'email est déjà utilisé.',
            'organisation.required' => 'L\'organisation est requise.',
            'address.required' => 'L\'adresse est requise.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'identificationNumber.required' => 'Le numéro d\'identification est requis.',
            'password.required' => 'Le mot de passe est requis.',
            'isAcceptedCondition.required' => 'Veuillez accepter les conditions.',
            'isAcceptedBiometric.required' => 'Veuillez accepter la biométrie.',
        ];
    }

    public function HttpResponseException(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'status'=>400,
            'error'=>true,
            'message'=>'Erreur de validation',
            'errors'=>$validator->errors()
        ]));
    }
}
