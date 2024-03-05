<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApolicesTable extends Migration
{
    public function up()
    {
        Schema::create('apolices', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->float('valor_segurado');
            $table->string('nome_segurado');
            // Outros campos necessários
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apolices');
    }
}
