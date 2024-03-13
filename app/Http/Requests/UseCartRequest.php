<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UseCartRequest extends FormRequest
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
            'quantity' => ['integer' ,'required'],
            'book_id' => ['string' ,'required'],
        ];
    }
    public function messages(): array
{
    return [
        'quantity.int' => 'A quantity is int',
        'bookId.string' => 'A bookId is string',
        'quantity.required' => 'A quantity is required',
        'bookId.required' => 'A bookId is required',
    ];
}
}
