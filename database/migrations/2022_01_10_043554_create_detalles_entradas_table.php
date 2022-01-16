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
            $table->string('tipo_unidad')->nullable();
            $table->integer('valor_unidad')->default(0);
            $table->integer('cantidad_unidad')->default(0);
            $table->string('estado_conservacion')->nullable();
            $table->boolean('estado_activo')->default('0');
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
