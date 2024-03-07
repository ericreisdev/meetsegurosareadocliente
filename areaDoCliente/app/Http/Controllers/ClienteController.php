<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apolice;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    // Método para mostrar a página de perfil do cliente
    public function perfil()
    {
        $apolices = Apolice::where('user_id', auth()->id())->get();
        return view('cliente.perfil', compact('apolices')); // Retorna a view de perfil
    }

    // Aqui, você pode adicionar outros métodos para as demais rotas
    public function atualizarPerfil(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Adicione validação para outros campos se necessário
        ]);
    
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        // Atualize outros campos se necessário
        $user->save();
    
        return redirect()->route('cliente.perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
    
    public function editarPerfil()
{
    return view('cliente.editarPerfil'); // Certifique-se de que esta view exista
}


public function apolices()
{
    $userId = Auth::id(); // Obtém o ID do usuário logado
    $apolices = Apolice::where('user_id', $userId)->get(); // Busca as apólices associadas ao usuário

    return view('cliente.apolices', compact('apolices')); // Passa as apólices para a view
}

}

//C:\laragon\www\public_html\areaDoCliente\app\Http\Controllers\ClienteController.php