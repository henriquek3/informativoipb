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
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password')->default(\Illuminate\Support\Facades\Hash::make("ipb@123"));;
            $table->string('cpf', 15);
            $table->integer('status')->nullable();
            $table->integer('nivel')->nullable();
            $table->integer('perfil')->nullable();
            $table->text('observacoes')->nullable();
            $table->unsignedInteger('id_presbitero')->nullable();
            $table->unsignedInteger('user_id')->nullable();

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
        Schema::drop('usuarios');
    }

}
