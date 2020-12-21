<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:8|max:255',
            'email'=>'required|email',
            'password'=>'required|min:8|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'El campo :attribute es requerido',
            'min'=>'El campo :attribute debe contener al menos 8 caracteres',
            'max'=>'El campo :attribute no puede contener tantos caracteres',
            'email'=>'El campo :attribute debe ser uno valido',
        ];  
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'correo',
            'password' => 'contraseña'
        ];
    }
}
