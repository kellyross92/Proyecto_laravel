<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        
        return [                                     // Con esto validamos los campos que son obligatorios
            'name' => 'required|max:10',
            'descripcion' =>'required|min:10',
            'categoria' => 'required'
        ];
    }
// Esta funcion cambia el mensaje del required
    public function attributes(){
        return [
            'name' => 'nombre del curso',
        ];
    }

// Esta funcion cambia el mensaje de otros requerimientos
    public function messages(){
        return [
            'descripcion.min' => 'Debe ingresar una descripcion del curso',
        ];
    }
}
