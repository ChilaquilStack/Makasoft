<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePokemonPost extends FormRequest
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
            'level' => 'required|integer',
            'class' => 'required|String',
            'picture' => 'required|image'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre del Pokemon es requerido',
            'level.required' => 'El nivel del Pokemon es requerido',
            'level.integer' => 'El nivel del Pokemon debe ser un numero positivo',
            'class.required' => 'La clase del Pokemon es requerida',
            'class.String' => 'La clase del Pokemon debe ser un nombre valido',
            'picture.required' => 'La imagen del Pokemon es requerida',
            'picture.image' => 'La imagen del Pokemon debe ser un archivo .jpeg'
        ];
    }
}
