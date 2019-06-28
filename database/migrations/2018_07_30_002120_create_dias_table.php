<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration
{

    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->enum('estatus',['ACTIVO','INACTIVO','TEMPORAL','OBSERVACION']);
          $table->enum('dia_guardia',['DOMINGO','LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO']);
          $table->date('f_ingreso');
          $table->date('f_baja')->nullable();
          $table->timestamps();
          $table->softDeletes();
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
        Schema::dropIfExists('dias');
    }
}
