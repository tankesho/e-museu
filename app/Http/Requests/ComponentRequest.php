<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
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
            'components.*.item_id' => [
                'sometimes',
                'required',
                'integer',
                'numeric',
                'exists:items,id',
                function ($attribute, $value, $fail) {
                    $ids = collect(request()->input('components'))->pluck('item_id');
                    $count = $ids->count();
                    $uniqueCount = $ids->unique()->count();
                    if ($count !== $uniqueCount) {
                        $fail('Os itens precisam ser diferentes.');
                    }
                },
            ],
        ];
    }
}
