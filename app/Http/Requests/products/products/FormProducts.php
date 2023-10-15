<?php

namespace App\Http\Requests\products\products;

use Illuminate\Foundation\Http\FormRequest;

class FormProducts extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:category,uuid',
            'subcategory' => 'required|exists:subcategory,uuid',
            'brand' => 'required|exists:brands,uuid',
            'barcode' => 'required|string|max:255|unique:products,barcode',
            'model' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no debe ser mayor a 255 caracteres',
            'description.required' => 'La descripción es requerida',
            'description.string' => 'La descripción debe ser una cadena de texto',
            'category.required' => 'La categoría es requerida',
            'category.exists' => 'La categoría no existe',
            'subcategory.required' => 'La subcategoría es requerida',
            'subcategory.exists' => 'La subcategoría no existe',
            'brand.required' => 'La marca es requerida',
            'brand.exists' => 'La marca no existe',
            'barcode.required' => 'El código de barras es requerido',
            'barcode.string' => 'El código de barras debe ser una cadena de texto',
            'barcode.max' => 'El código de barras no debe ser mayor a 255 caracteres',
            'barcode.unique' => 'El código de barras ya existe',
            'model.required' => 'El modelo es requerido',
            'model.string' => 'El modelo debe ser una cadena de texto',
            'model.max' => 'El modelo no debe ser mayor a 255 caracteres',
        ];
    }
}
