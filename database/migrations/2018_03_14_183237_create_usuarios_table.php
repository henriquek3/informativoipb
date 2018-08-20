<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 15)->unique();
            $table->integer('status')->nullable();
            $table->integer('nivel')->nullable();
            $table->integer('perfil')->nullable();
            $table->text('observacoes')->nullable();
            $table->unsignedInteger('id_sinodo')->nullable();
            $table->unsignedInteger('id_presbiterio')->nullable();
            $table->unsignedInteger('id_igreja')->nullable();
            $table->unsignedInteger('id_presbitero')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
