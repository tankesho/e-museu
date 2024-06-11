<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rules\File;

class StoreItemRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:200|unique:items',
            'date' => 'date',
            'description' => 'required|string|min:1|max:1000',
            'detail' => 'required|string|min:1|max:10000',
            'history' => 'required|string|min:1|max:50000',
            'section_id' => 'required|integer|numeric|exists:sections,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
            'detail.required' => 'O campo detalhes é obrigatório.',
            'history.required' => 'O campo história é obrigatório.',
            'section_id.required' => 'O campo seção é obrigatório.',
            'image.required' => 'O campo imagem é obrigatório.',
        ];
    }
}