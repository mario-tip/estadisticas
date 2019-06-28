<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nac', 10);
            $table->string('lugar_nac', 50);
            $table->string('direccion', 200);
            $table->string('password')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('tel_casa', 20)->nullable();
            $table->mediumText('img_url')->nullable();
            $table->string('latitud', 20)->nullable();
            $table->string('longitud', 20)->nullable();
            $table->string('calle', 50)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('colonia', 100)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('redes_sociales')->nullable();
            $table->enum('genero',['HOMBRE','MUJER']);
            $table->enum('estado_civil',['CASADO CHICO','CASADO MEDIANO', 'CASADO GRANDE', 'JOVEN', 'SOLO']);
            $table->enum('user_type', ['ADMIN', 'OBRERO']);
            $table->unsignedInteger('iglesia_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('iglesia_id')->references('id')->on('iglesias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('users');
    }
}
