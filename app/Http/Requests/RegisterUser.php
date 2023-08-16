<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            // User data
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'lastname' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password'=> 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password',

            // Store data
            'store_tin' => 'required|regex:/^[a-zA-Z0-9]+$/u|max:13',
            'store_name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'store_email' => 'required|email|max:255', 
            'store_phone' => 'required|regex:/^[0-9]+$/u|max:10',
            'store_address' => 'required|regex:/^[\pL\s]+$/u|max:255',
            
            // Branch data
            'branch_name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'branch_email' => 'required|email|max:255',
            'branch_phone' => 'required|regex:/^[0-9]+$/u|max:10',
            'branch_address' => 'required|regex:/^[\pL\s]+$/u|max:255',
        ];
    }

    //Atributos personalizados
    public function attributes(): array
    {
        return [
            // User data
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo electrónico',
            'password'=> 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',

            // Store data
            'store_tin' => 'RFC',
            'store_name' => 'nombre de la tienda',
            'store_email' => 'correo electrónico de la tienda',
            'store_phone' => 'teléfono de la tienda',
            'store_address' => 'dirección de la tienda',

            // Branch data
            'branch_name' => 'nombre de la sucursal',
            'branch_email' => 'correo electrónico de la sucursal',
            'branch_phone' => 'teléfono de la sucursal',
            'branch_address' => 'dirección de la sucursal',
        ];
    }  
}
