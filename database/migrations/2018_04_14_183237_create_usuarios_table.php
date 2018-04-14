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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbitero')->nullable()->index('usuarios_fk0');
            $table->string('nome');
            $table->string('email');
            $table->string('password');
            $table->string('cpf', 15);
            $table->integer('status')->nullable();
            $table->integer('nivel')->nullable();
            $table->integer('perfil')->nullable();
            $table->text('observacoes')->nullable();
            $table->integer('usuario_inclusao')->nullable();
            $table->integer('usuario_alteracao')->nullable();
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
