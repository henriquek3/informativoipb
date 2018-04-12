<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresbiterosCamposTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbiteros_campos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbitero')->index('presbiteros_campos_fk0');
            $table->integer('id_igreja')->nullable()->index('presbiteros_campos_fk1');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presbiteros_campos');
    }

}
