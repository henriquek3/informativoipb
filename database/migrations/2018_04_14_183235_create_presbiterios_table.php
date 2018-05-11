<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbiterios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_sinodo')->index('presbiterios_fk0');
            $table->string('nome');
            $table->string('sigla', 10);
            $table->integer('regiao');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('presbiterios');
    }

}
