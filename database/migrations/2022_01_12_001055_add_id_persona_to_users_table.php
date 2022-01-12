<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class AddIdPersonaToUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_persona')->nullable();
            $table->foreign('id_persona')->references('id')->on('personas');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        });
    }
}
