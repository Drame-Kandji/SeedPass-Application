<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeedLotRequest extends FormRequest
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
            'variety' => ['required', 'string'],
            'geographicOrigin' => ['required', 'string'],
            'yearOfHarvest' => ['required', 'integer', 'digits:4'],
            'processing' => ['required', 'string'],
            'certification' => ['required', 'string'],
            'germinationQuality' => ['required', 'numeric'],
            'productionSplot' => ['required', 'string'],
            'quantityProduced' => ['required', 'numeric'],
            'growingConditions' => ['nullable', 'string'],
            'isCertified' => ['nullable', 'boolean'],
            'certification_body_id' => ['nullable', 'integer'],
            'productor_id' => ['required', 'integer'],
            'lot_number' => ['required', 'string'],
            'image' => ['nullable', 'string'],
            'qr_code' => ['nullable', 'string'],

        ];
    }
}
