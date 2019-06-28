<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabProfsTable extends Migration
{

    public function up()
    {
        Schema::create('lab_profs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('max_grado');
          $table->boolean('estudia');
          $table->string('nombre_esc')->nullable();
          $table->boolean('trabaja');
          $table->string('lugar_tra')->nullable();
          $table->string('habilidad')->nullable();
          $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('lab_profs');
    }
}
