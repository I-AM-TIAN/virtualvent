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
        Schema::create('corporativos', function (Blueprint $table) {
            $table->id();
            $table->integer('nit')->unique();
            $table->string('razon_social')->unique();
            $table->unsignedBigInteger('direccion');
            $table->foreign('direccion')->references('id')->on('direccions');
            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporativos');
    }
};
