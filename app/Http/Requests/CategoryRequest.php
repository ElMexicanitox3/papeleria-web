<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $category = $this->route('uuid');
        $ignoreRule = ($category) ? Rule::unique('category', 'name')->ignore($category, 'uuid') : 'unique:category,name';

        return [
            'name' => [
                'required',
                'regex:/^[\pL\s]+$/u',
                'max:255',
                $ignoreRule,
            ],
        ];
    }

    //Atributos personalizados
    public function attributes(): array
    {
        return [
            'name' => 'nombre de la categoría',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'name.unique' => 'El nombre de la categoría ya existe',
            'name.required' => 'El nombre de la categoría es requerida',
            'name.regex' => 'El nombre de la categoría solo puede contener letras',
        ];
    }
}
