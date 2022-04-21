<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'                 => 'required|min:5',
            'email'                => 'required|email|unique:users,email',
            'password'             => 'required|min:5|max:12'
        ];
    }

    public function messages()
    {
        return [
            'required'           => 'Preencha o campo :attribute',
            'password.min'       => 'O campo name deve ter no minimo 5 caracteres',
            'password.max'       => 'O campo contact deve ter no máximo 12 números',
            'email.email'        => 'Preencha com um email válido',
            'name.min'           => 'O campo name deve ter no minimo 5 caracteres',
            'email.unique'       => 'O email informado já esta cadastrado'
        ];
    }
}
