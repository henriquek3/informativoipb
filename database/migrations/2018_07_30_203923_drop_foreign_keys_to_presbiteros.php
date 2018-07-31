<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeysToPresbiteros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presbiteros', function (Blueprint $table) {
            $table->dropForeign('presbiteros_fk2')->change();
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
            $table->foreign('nacionalidade', 'presbiteros_fk2')->references('id')->on('paises')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }
}
