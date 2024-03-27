<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Apolice;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Método para mostrar o painel do administrador

    public function painel()
    {
        $apolicesPorUsuario = Apolice::with('user')->get()->groupBy('user_id');
        return view('admin.painel', compact('apolicesPorUsuario'));
    }

    // Método para mostrar o formulário de edição de perfil do usuário
    public function editarUsuario($id)
    {
        $user = User::findOrFail($id); // Encontra o usuário pelo ID ou falha
        return view('admin.editarUsuario', compact('user')); // Retorna a view de edição com os dados do usuário
    }

    // Método para atualizar o perfil do usuário
    public function atualizarApolice(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'risco_segurado' => 'required|string',
            'vigencia' => 'required|date',
            'segurado' => 'required|string',
        ]);
    
        $apolice = Apolice::findOrFail($id);
        $apolice->update($validatedData);
    
        return redirect()->route('admin.painel')->with('success', 'Apólice atualizada com sucesso!');
    }
    

    // Novos métodos para gerenciamento de apólices
    public function inserirApolice(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'risco_segurado' => 'required|string',
            'vigencia' => 'required|date',
            'user_id' => 'required|exists:users,id' // Verifica se o usuário existe
        ]);
    
        $apoliceData = $validatedData;
        $apoliceData['segurado'] = User::findOrFail($validatedData['user_id'])->full_name; // Define o nome do segurado
    
        Apolice::create($apoliceData);
    
        return redirect()->route('admin.painel')->with('success', 'Apólice inserida com sucesso!');
    }
    
    

    public function uploadPdf(Request $request, $apoliceId)
    {
        $apolice = Apolice::findOrFail($apoliceId);

        // Validação do arquivo PDF
        $request->validate(['pdf' => 'required|file|mimes:pdf']);

        // Armazenamento do arquivo
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('apolices', 'public'); // Especificar o disco se necessário
            $apolice->pdf_path = $pdfPath;
            $apolice->save();
        }

        return redirect()->route('admin.painel')->with('success', 'PDF da apólice atualizado com sucesso!');
    }
    public function excluirApolice($id)
    {
        $apolice = Apolice::findOrFail($id);
    
        // Verifique se o caminho do arquivo PDF existe antes de tentar deletar
        if ($apolice->pdf_path) {
            Storage::disk('public')->delete($apolice->pdf_path);
        }
    
        $apolice->delete();
    
        return redirect()->route('admin.painel')->with('success', 'Apólice excluída com sucesso!');
    }

    public function gerenciarDocumentos(Request $request, $apoliceId)
    {
        $apolice = Apolice::findOrFail($apoliceId);
        // Implementação do gerenciamento de documentos
        // ...

        return redirect()->route('admin.painel')->with('success', 'Documentos da apólice gerenciados com sucesso!');
    }
    public function mostrarInserirApolice()
{
    $users = User::all(); // Busca todos os usuários
    return view('admin.inserirApolice', compact('users'));
}
    
    public function mostrarUploadPdf($apoliceId)
    {
        $apolice = Apolice::findOrFail($apoliceId);
        return view('admin.uploadPdf', compact('apolice'));
    }

    public function editarApolice($id)
    {
        $apolice = Apolice::findOrFail($id);
        $user = User::findOrFail($apolice->user_id); // Busca informações do usuário
    
        return view('admin.editarApolice', compact('apolice', 'user'));
    }
    


    // Outros métodos conforme necessário
}
// C:\laragon\www\public_html\areaDoCliente\app\Http\Controllers\AdminController.php