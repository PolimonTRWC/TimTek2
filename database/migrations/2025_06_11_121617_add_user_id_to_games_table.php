<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->nullable() // ← ļaujam pagaidām NULL
                ->constrained()
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
