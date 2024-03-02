<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Removendo colunas desnecessárias
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('status');
            // Se você tiver outras colunas para remover, adicione-as aqui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Adicionar novamente as colunas removidas no up() para reversão
            $table->string('phone', 255)->nullable()->after('full_name');
            $table->text('address')->nullable()->after('phone');
            $table->tinyInteger('status')->default(1)->after('address');
            // Se você adicionou outras colunas para remoção, reverta-as aqui
        });
    }
};


//C:\laragon\www\public_html\areaDoCliente\database\migrations\2024_02_27_010323_modify_users_table.php