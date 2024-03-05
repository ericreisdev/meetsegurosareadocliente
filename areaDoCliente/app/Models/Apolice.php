<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    protected $fillable = [
        // Lista de campos que podem ser atribuídos em massa
        'tipo', 'valor_segurado', 'nome_segurado', // e outros campos relevantes
    ];

    // Métodos adicionais e lógicas do modelo
}
