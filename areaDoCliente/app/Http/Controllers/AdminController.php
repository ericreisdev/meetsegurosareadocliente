<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importe o modelo User se você precisar acessar informações do usuário

class AdminController extends Controller
{
    // Método para mostrar o painel do administrador
    public function painel()
    {
        return view('admin.painel'); // Retorna a view do painel do administrador
    }

    // Método para mostrar o formulário de edição de perfil do usuário
    public function editarUsuario($id)
    {
        $user = User::findOrFail($id); // Encontra o usuário pelo ID ou falha
        return view('admin.editarUsuario', compact('user')); // Retorna a view de edição com os dados do usuário
    }

    // Método para atualizar o perfil do usuário
    public function atualizarUsuario(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Adicione aqui a lógica de validação e atualização dos dados do usuário

        $user->save(); // Salva as mudanças no usuário

        return redirect()->route('admin.painel')->with('success', 'Perfil de usuário atualizado com sucesso!');
    }

    // Aqui, você pode adicionar outros métodos conforme necessário
}
