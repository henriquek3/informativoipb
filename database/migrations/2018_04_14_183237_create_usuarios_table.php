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
            $table->integer('id', true);
            $table->integer('id_presbitero')->nullable()->index('usuarios_fk0');
            $table->string('nome');
            $table->string('email');
            $table->string('password')->default(\Illuminate\Support\Facades\Hash::make("ipb@123"));;
            $table->string('cpf', 15);
            $table->integer('status')->nullable();
            $table->integer('nivel')->nullable();
            $table->integer('perfil')->nullable();
            $table->text('observacoes')->nullable();
            $table->integer('usuario_inclusao')->nullable();
            $table->integer('usuario_alteracao')->nullable();
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
