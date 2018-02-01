<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Video 09: Crear desde una migracion, para levantar a dentro de la BD

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()        //Ejecutar una migracion
    {
        Schema::create('messages', function (Blueprint $table) {    //Crear una tabla
            $table->increments('id');
            $table->timestamps();       //Fecha de creacion y modificacion [cre, mod]

            $table->string('content');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()      //volver atras una migracion
    {
        Schema::dropIfExists('messages');
    }
}
