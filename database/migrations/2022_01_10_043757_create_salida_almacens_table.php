<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSalidaAlmacensTable extends Migration
{

    public function up()
    {
        Schema::create('salida_almacen', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado_activo')->default('0');
            $table->timestamps();
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_persona')
                ->nullable()
                ->constrained('personas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('salida_almacen');
    }
}
