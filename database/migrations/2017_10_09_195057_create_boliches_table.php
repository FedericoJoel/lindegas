<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBolichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boliches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->double('puntuacion');
            $table->double('latitud');
            $table->double('longitud');
            $table->string('domicilio');
            $table->string('descripcion');
            $table->string('telefono');
            $table->time('horario');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('boliches');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
