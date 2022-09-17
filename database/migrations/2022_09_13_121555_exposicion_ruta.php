<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exposicion_ruta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exposicion_id');
            $table->foreign('exposicion_id')->references('id')->on('exposicions')->onDelete('cascade');
            
            $table->unsignedBigInteger('ruta_id');
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exposicion_ruta');
    }
};
