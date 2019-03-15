<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserPost extends FormRequest
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
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id . ',id',
            'password' => 'required',
            'rol_id' => 'required',
            'picture' => 'nullable',
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
