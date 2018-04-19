<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunioesPresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes_presbiterios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbiterio')->index('reunioes_presbiterios_fk0');
            $table->string('data_reuniao', 10)->nullable();
            $table->string('ano', 10)->nullable();
            $table->integer('status')->nullable();
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
        Schema::drop('reunioes_presbiterios');
    }

}
