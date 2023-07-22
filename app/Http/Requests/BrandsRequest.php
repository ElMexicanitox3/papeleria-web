<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BrandsRequest extends FormRequest
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
        $brand = $this->route('uuid');
        $ignoreRule = ($brand) ? Rule::unique('brands', 'name')->ignore($brand, 'uuid') : 'unique:brands,name';

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                $ignoreRule,
            ],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'El nombre de la marca es requerido',
            'name.string' => 'La marca debe ser un texto',
            'name.max' => 'El nombre de la marca debe tener máximo 255 caracteres',
            'name.unique' => 'El nombre de la marca ya existe, intente con otra',
        ];
    }
}
