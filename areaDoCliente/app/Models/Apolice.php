<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    protected $fillable = [
        // Lista de campos que podem ser atribuídos em massa
        'tipo', 'valor_segurado', 'nome_segurado', 'user_id' // e outros campos relevantes
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Métodos adicionais e lógicas do modelo
}


// C:\laragon\www\public_html\areaDoCliente\app\Models\Apolice.php