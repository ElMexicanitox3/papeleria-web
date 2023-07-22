<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\CategoryModel;

class SubcategoryRequest extends FormRequest
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
        $subcategoryUuid = $this->route('uuid'); // Obtén el UUID de la subcategoría si existe (para la edición)

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subcategory', 'name')->where(function ($query) {
                    // Agregar una condición para que la regla de validación sea únicamente dentro de la categoría seleccionada
                    $categoryUuid = $this->input('category');
                    if ($categoryUuid) {
                        $category = CategoryModel::where('uuid', $categoryUuid)->first();
                        if ($category) {
                            $query->where('category_id', $category->id);
                        }
                    }
                })->ignore($subcategoryUuid, 'uuid'), // Ignorar el UUID de la subcategoría en caso de edición
            ],
            'category' => 'required|uuid|exists:category,uuid',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'El nombre de subcategoría ya existe',
            'name.required' => 'El nombre de subcategoría es requerida',
            'category.required' => 'Seleccione una categoría',
        ];
    }
}
