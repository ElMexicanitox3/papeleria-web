<?php

namespace App\Http\Requests\Products\subcategory;

use Illuminate\Foundation\Http\FormRequest;

class FormSubcategory extends FormRequest
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
        // Validamos que subcategoria sea requerido, que la convinacion de categoria y subcategoria sea unica y que la categoria exista
        return [
            'category' => 'required|exists:category,uuid',
            'subcategory' => 'required|unique:subcategory,name,NULL,id,category_id,' . $this->category,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'subcategory.required' => 'El campo subcategoria es requerido',
            'subcategory.unique' => 'La convinacion de categoria y subcategoria debe ser unica',
            'category.required' => 'El campo categoria es requerido',
            'category.exists' => 'La categoria no existe',
        ];
    }
}
