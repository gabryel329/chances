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
        Schema::create('chancesvit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campeao')->nullable();
            $table->string('libertadores')->nullable();
            $table->string('sulamericana')->nullable();
            $table->string('rebaixamento')->nullable();
            $table->string('previsao')->nullable();
            $table->string('posicao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chancesvit');
    }
};
