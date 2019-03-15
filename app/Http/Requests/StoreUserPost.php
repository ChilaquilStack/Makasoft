<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'rol_id' => 'required',
            'picture' => 'nullable|required|image',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Ingrese un nombre',
            'email.required' => 'Ingrese un correo',
            'email.unique' => 'Ese correo ya existe',
            'email.email' => 'Ingrese un correo valido',
            'password.required' => 'Ingrese una contraseña',
            'rol_id.required' => 'Ingrese un rol',
            'picture.required' => 'Ingrese una imagen',
            'picture.image' => 'Ingrese una imagen en formato jpeg o similar'
        ];
    }
}
