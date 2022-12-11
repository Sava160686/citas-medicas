<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {

            $table->id('noticia_id');
            $table->bigInteger('usuario_id')->unsigned();

            $table->string('titulo');
            $table->string('medio');
            $table->mediumText('descripcion');
            $table->string('archivo');
            $table->timestamp('fecha_registro');
            $table->enum('estado', ['ACT','INA'])->default('ACT');

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
