<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToApolicesTable extends Migration
{
    public function up()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
