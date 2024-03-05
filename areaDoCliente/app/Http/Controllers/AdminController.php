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
        // Buscar todas as apólices
        $apolices = Apolice::all(); // Ou qualquer outra lógica para buscar as apólices

        // Passar as apólices para a view
        return view('admin.painel', compact('apolices'));
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
            // Validação dos campos
            'tipo' => 'required|string',
            'valor_segurado' => 'required|numeric',
            'nome_segurado' => 'required|string',
        ]);
    
        $apolice = Apolice::findOrFail($id);
        $apolice->update($validatedData);
    
        return redirect()->route('admin.painel')->with('success', 'Apólice atualizada com sucesso!');
    }
    

    // Novos métodos para gerenciamento de apólices

    public function inserirApolice(Request $request)
    {
        // Validação dos dados da apólice
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'valor_segurado' => 'required|numeric',
            'nome_segurado' => 'required|string',
            // Outras validações conforme necessário
        ]);

        Apolice::create($validatedData);

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
        return view('admin.inserirApolice');
    }
    
    public function mostrarUploadPdf($apoliceId)
    {
        $apolice = Apolice::findOrFail($apoliceId);
        return view('admin.uploadPdf', compact('apolice'));
    }

    public function editarApolice($id)
{
    $apolice = Apolice::findOrFail($id);
    // Retorne a view de edição, passando a apólice como dado
    return view('admin.editarApolice', compact('apolice'));
}


    // Outros métodos conforme necessário
}
// C:\laragon\www\public_html\areaDoCliente\app\Http\Controllers\AdminController.php