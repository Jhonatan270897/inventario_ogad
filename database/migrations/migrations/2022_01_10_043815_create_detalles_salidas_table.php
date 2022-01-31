<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesSalidasTable extends Migration
{

    public function up()
    {
        Schema::create('detalles_salidas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_salida');
            $table->string('tipo_unidad')->nullable();
            $table->text('detalles')->nullable();
            $table->string('estado_conservacion')->nullable();
            $table->boolean('estado_activo')->default('0');
            $table->timestamps();
            $table->foreignId('id_stock')
                ->nullable()
                ->constrained('stocks')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_salida_almacen')
                ->nullable()
                ->constrained('salida_almacen')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('detalles_salidas');
    }
}
