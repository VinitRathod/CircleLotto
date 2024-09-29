<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            //
            'numbers_id' => 'required|array',
            'amount' => 'required|numeric',
            // 'cardNumber' => 'required|max_digits:16|numeric',
            // 'expiryDate' => 'required|',
            // 'cardHolderName' => 'required',
            'cv2' => 'required|numeric',
            // 'saveCard' => 'required|boolean',
        ];
    }
}
