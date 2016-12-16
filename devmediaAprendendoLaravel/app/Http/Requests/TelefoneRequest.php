<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneRequest extends FormRequest
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
    public function messages(){
        return[
            'titulo.required'=>'Coloque um Titulo',
            'titulo.max'=>'estorou maximo de caracteres',
            'telefone.required'=>'telefone obrigatorio',
            'telefone.max'=>'estorou maximo de caracteres',
            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=>'required|max:255',
            'telefone'=>'required|numeric'
            //
        ];
    }
}
