<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteValorSeguradoFromApolicesTable extends Migration
{
    public function up()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->dropColumn(['valor_segurado', 'nome_segurado']);
        });
    }

    public function down()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->decimal('valor_segurado', 8, 2)->nullable();
            $table->string('nome_segurado', 255);
        });
    }
}
