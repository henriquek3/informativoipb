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
            $table->string('senha');
            $table->string('cpf', 15);
            $table->integer('status')->nullable();
            $table->integer('nivel')->nullable();
            $table->integer('perfil')->nullable();
            $table->text('observacoes')->nullable();
            $table->integer('usuario_inclusao')->index('usuarios_fk1');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('usuarios_fk2');
            $table->string('data_alteracao', 10)->nullable();
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
