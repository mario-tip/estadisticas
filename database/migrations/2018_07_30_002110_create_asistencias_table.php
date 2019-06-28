<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{

    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('oracion_id');
          $table->unsignedInteger('iglesia_id');
          $table->timestamps();
          $table->softDeletes();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('iglesia_id')->references('id')->on('iglesias');
          $table->foreign('oracion_id')->references('id')->on('oracions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
