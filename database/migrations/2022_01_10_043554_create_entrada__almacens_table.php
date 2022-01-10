<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaAlmacensTable extends Migration
{

    public function up()
    {
        Schema::create('entrada__almacens', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('estado_conservacion');
            $table->boolean('estado_activo')->default('0');
            $table->text('detalles')->nullable();
            $table->timestamps();
            $table->foreignId('id_detalles_entrada')
                ->nullable()
                ->constrained('detalles__entradas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_producto')
                ->nullable()
                ->constrained('productos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrada__almacens');
    }
}
