<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaAlmacensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida__almacens', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_salida');
            $table->string('estado_conservacion');
            $table->boolean('estado_activo')->default('0');
            $table->timestamps();
            $table->foreignId('id_stock')
                ->nullable()
                ->constrained('stocks')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_detalles_salida')
                ->nullable()
                ->constrained('detalles__salidas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida__almacens');
    }
}
