<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8)->unique();
            $table->string('nombre_persona');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->boolean('estado_activo')->default('0');
        });
    }


    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
