<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ContatoStoreRequest extends FormRequest
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
            'name'          => 'required|min:5',
            'email'         => 'required|email|unique:contatos,email',
            'contact'       => 'required|min:9|max:9|unique:contatos,contact',
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'Preencha o campo :attribute',
            'name.min'              => 'O campo name deve ter no minimo 5 caracteres',
            'email.email'           => 'Preencha com um email válido',
            'email.unique'          => 'O campo email já existe',
            'contact.min'           => 'O campo contact deve ter no minimo 9 números',
            'contact.max'           => 'O campo contact deve ter no máximo 9 números',
            'contact.unique'        => 'O campo contact já existe'
        ];
    }
}
