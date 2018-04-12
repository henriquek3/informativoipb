<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_presbitero')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->integer('status');
            $table->integer('nivel');
            $table->integer('perfil');
            $table->longText('observacoes')->nullable();
            $table->integer('id_user_insert');
            $table->string('data_insert');
            $table->integer('id_user_edit');
            $table->string('data_edit');


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
        Schema::dropIfExists('users');
    }
}
