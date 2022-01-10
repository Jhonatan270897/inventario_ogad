<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesEntradasTable extends Migration
{

    public function up()
    {
        Schema::create('detalles_entradas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('estado_conservacion');
            $table->boolean('estado_activo')->default('0');
            $table->text('detalles')->nullable();
            $table->timestamps();
            $table->foreignId('id_entrada_almacen')
                ->nullable()
                ->constrained('entrada_almacens')
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
        Schema::dropIfExists('detalles_entradas');
    }
}
