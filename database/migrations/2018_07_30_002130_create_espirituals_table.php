<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspiritualsTable extends Migration
{

    public function up()
    {
        Schema::create('espirituals', function (Blueprint $table) {
          $table->increments('id');
          $table->date('f_bau');
          $table->string('lug_bautismo')->nullable();
          $table->string('min_bau')->nullable();
          $table->date('f_espi')->nullable();
          $table->string('lu_espi')->nullable();
          $table->string('min_espi')->nullable();
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
        Schema::dropIfExists('espirituals');
    }
}
