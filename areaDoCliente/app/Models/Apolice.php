<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo', // Tipo de Seguro
        'risco_segurado', // Risco Segurado
        'vigencia', // Vigência
        'segurado', // Nome do Segurado
        'pdf_path', // Caminho para o PDF
        'user_id' // ID do usuário associado
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Métodos adicionais e lógicas do modelo
}


// C:\laragon\www\public_html\areaDoCliente\app\Models\Apolice.php