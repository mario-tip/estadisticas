<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIglesiasTable extends Migration
{

    public function up()
    {
        Schema::create('iglesias', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('direccion');
          $table->string('telefono');
          $table->string('email')->nullable();
          $table->string('web')->nullable();
          $table->mediumText('img')->nullable();
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
        Schema::dropIfExists('iglesias');
    }
}
