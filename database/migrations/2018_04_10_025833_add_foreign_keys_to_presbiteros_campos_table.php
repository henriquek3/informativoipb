<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPresbiterosCamposTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presbiteros_campos', function (Blueprint $table) {
            $table->foreign('id_presbitero', 'presbiteros_campos_fk0')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_igreja', 'presbiteros_campos_fk1')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presbiteros_campos', function (Blueprint $table) {
            $table->dropForeign('presbiteros_campos_fk0');
            $table->dropForeign('presbiteros_campos_fk1');
        });
    }

}
