<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedTinyInteger('players')->default(1)->after('description');
            $table->date('played_at')->nullable()->after('players');
        });
    }

    public function down(){
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['players', 'played_at']);
        });
    }

};
