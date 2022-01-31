<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('color')->nullable();
            $table->string('modelo')->nullable();
            $table->text('medida')->nullable();
            $table->boolean('estado_activo')->default('0');
            $table->foreignId('id_detalle_producto')
                ->nullable()
                ->constrained('detalle_productos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_marca')
                ->nullable()
                ->constrained('marcas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_categoria')
                ->nullable()
                ->constrained('categorias')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
