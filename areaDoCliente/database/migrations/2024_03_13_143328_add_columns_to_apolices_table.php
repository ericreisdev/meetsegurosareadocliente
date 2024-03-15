<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToApolicesTable extends Migration
{
    public function up()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->string('risco_segurado')->nullable();
            $table->date('vigencia')->nullable();
            $table->string('segurado')->nullable();
        });

        // Aqui você pode adicionar um código para atualizar registros existentes,
        // por exemplo, definindo valores padrão para registros existentes.
        // Exemplo: 
        // Apolice::whereNull('vigencia')->update(['vigencia' => '2024-01-01']);

        // Após atualizar os registros, remova o nullable se necessário
        // Schema::table('apolices', function (Blueprint $table) {
        //     $table->string('risco_segurado')->nullable(false)->change();
        //     $table->date('vigencia')->nullable(false)->change();
        //     $table->string('segurado')->nullable(false)->change();
        // });
    }

    public function down()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->dropColumn('risco_segurado');
            $table->dropColumn('vigencia');
            $table->dropColumn('segurado');
        });
    }
}
