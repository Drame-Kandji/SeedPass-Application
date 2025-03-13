<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeedLotRequest extends FormRequest
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
            'variety'=>['required','string'],
            'geographicOrigin'=>['required','string'],
            'yearOfHarvest' => ['required','date_format:Y'],
            'processing' => ['required','string'],
            'certification' => ['required','string'],
            'germinationQuality' => ['required','double'],
            'productionSplot' => ['required','string'],
            'quantityProduced' => ['required','double'],
            'growingConditions' => ['string'],
            'isCertified' => ['boolean'],
            'certification_body_id' => ['integer',],
        ];
    }
}
