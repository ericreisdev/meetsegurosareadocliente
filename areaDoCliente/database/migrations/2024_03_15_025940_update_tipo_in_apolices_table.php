<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration; // Esta é a linha que estava faltando
class UpdateTipoInApolicesTable extends Migration
{
    public function up()
    {
        // Atualize os registros com valores incompatíveis para 'Diversos'
        DB::table('apolices')
        ->whereNotIn('tipo', [
            'Carro', 'Bike', 'Moto', 'Caminhão', 'Residencial', 
            'Plano Saúde Empresarial', 'Empresarial', 'Condomínio', 'Vida', 
            'Diversos', 'RC Certificação Digital', 'Seguro Auto Frota', 
            'Motorista de Aplicativo'
        ])
        ->update(['tipo' => 'Diversos']);
    
    
        // Depois de atualizar, modifique a estrutura da coluna 'tipo'
        Schema::table('apolices', function (Blueprint $table) {
            $table->enum('tipo', [
                'Carro', 'Bike', 'Moto', 'Caminhão', 'Residencial', 
                'Plano Saúde Empresarial', 'Empresarial', 'Condomínio', 'Vida', 
                'Diversos', 'RC Certificação Digital', 'Seguro Auto Frota', 
                'Motorista de Aplicativo'
            ])->change();
        });
    }
    
    public function down()
    {
        Schema::table('apolices', function (Blueprint $table) {
            // Reverter para o estado anterior aqui, se necessário
        });
    }
}

