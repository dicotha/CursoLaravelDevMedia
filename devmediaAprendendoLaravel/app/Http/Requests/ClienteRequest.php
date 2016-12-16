<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome.required'=>'Coloque um nome',
            'nome.max'=>'estorou maximo de caracteres',
            'email.required'=>'email obrigatorio',
            'email.max'=>'estorou maximo de caracteres',
            'email.email'=>'email invalido',
            'endereço.required'=>'endereço obrigatorio',
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
            //
        'nome'=>'required|max:255',
        'email'=>'required|max:255|email',
        'endereço'=>'required',

        ];
    }
}
