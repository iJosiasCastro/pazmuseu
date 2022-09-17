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
        Schema::create('recorridos', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->integer('hour');
            $table->text('description');

            $table->unsignedBigInteger('guia_id');
            $table->foreign('guia_id')->references('id')->on('guias')->onDelete('cascade');

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
        Schema::dropIfExists('recorridos');
    }
};
