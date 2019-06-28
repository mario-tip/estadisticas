<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarsTable extends Migration
{

    public function up()
    {
        Schema::create('familiars', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom_conyuge');
          $table->string('gpo_conyuge');
          $table->string('enlace_religioso');
          $table->Integer('cant_hijos');
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
        Schema::dropIfExists('familiars');
    }
}
