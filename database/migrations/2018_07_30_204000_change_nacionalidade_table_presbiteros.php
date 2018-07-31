<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNacionalidadeTablePresbiteros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presbiteros', function (Blueprint $table) {
            $table->string('nacionalidade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presbiteros', function (Blueprint $table) {
            $table->integer('nacionalidade')->change();
        });
    }
}
