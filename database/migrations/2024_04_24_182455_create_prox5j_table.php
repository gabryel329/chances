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
        Schema::create('prox5j', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('timecasa')->nullable();
            $table->string('timefora')->nullable();
            $table->string('vitoria')->nullable();
            $table->string('empate')->nullable();
            $table->string('derrota')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prox5j');
    }
};
