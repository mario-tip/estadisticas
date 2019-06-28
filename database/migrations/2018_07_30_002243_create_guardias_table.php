<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiasTable extends Migration
{

    public function up()
    {
        Schema::create('guardias', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('entrada');
            $table->dateTime('salida');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('iglesia_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('iglesia_id')->references('id')->on('iglesias');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardias');
    }
}
