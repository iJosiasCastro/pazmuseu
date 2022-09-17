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
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->boolean('confirmada');

            $table->unsignedBigInteger('turno_id');
            $table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');

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
        Schema::dropIfExists('inscripcions');
    }
};
