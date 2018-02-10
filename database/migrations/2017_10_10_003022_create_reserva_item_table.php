<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reservas');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('items');
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
        Schema::dropIfExists('item_reserva');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
