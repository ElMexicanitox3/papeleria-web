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
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password',
        ];
    }

    //Atributos personalizados
    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo electrónico',
            'password'=> 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
        ];
    }    
    
}
