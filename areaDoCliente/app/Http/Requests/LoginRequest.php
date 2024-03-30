<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string', // Validação para CPF/CNPJ
            'password' => 'required|string',
        ];
    }
}