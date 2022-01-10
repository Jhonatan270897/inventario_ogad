<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->string('color')->nullable();
            $table->string('modelo')->nullable();
            $table->text('detalles')->nullable();
            $table->boolean('estado_activo')->default('0');
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
