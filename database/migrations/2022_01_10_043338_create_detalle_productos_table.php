<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleProductosTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto')->unique();
            $table->text('descripcion')->nullable();
            $table->boolean('estado_activo')->default('0');
        });
    }
    public function down()
    {
        Schema::dropIfExists('detalle_productos');
    }
}
