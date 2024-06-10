<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingleExtraRequest extends FormRequest
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
            'info' => 'required|string|min:1|max:10000',
            'item_id' => 'required|integer|numeric|exists:items,id',
            'proprietary_id' => 'sometimes|integer|numeric|exists:proprietaries,id',
            'validation' => 'sometimes|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'info.required' => 'O campo curiosidade é obrigatório.',
        ];
    }
}
