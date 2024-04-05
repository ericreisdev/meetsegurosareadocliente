<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Incluir o Facade Log
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        // Log antes da validação
        Log::info('Inicio do processo de criação de usuário com os seguintes dados', $input);

        Validator::make($input, [
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        // Log após a validação
        Log::info('Validação concluída com sucesso para o usuário: ' . $input['username']);

        // Criação do usuário
        $user = User::create([
            'full_name' => $input['full_name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Log após a criação do usuário
        Log::info('Usuário criado com sucesso: ' . $user->id);

        return $user;
    }
}

// C:\laragon\www\public_html\areaDoCliente\app\Actions\Fortify\CreateNewUser.php


