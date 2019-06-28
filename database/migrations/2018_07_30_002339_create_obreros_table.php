<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obreros', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 50);
          $table->string('apellidos', 150);
          $table->string('img_url', 20);
          $table->string('correo', 50)->unique()->nullable();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obreros');
    }
}
