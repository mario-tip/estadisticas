<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadsTable extends Migration
{

    public function up()
    {

        Schema::create('actividads', function (Blueprint $table) {
          $table->increments('id');
          $table->string('descripcion');
          $table->timestamps();
          $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actividads');
    }
}
