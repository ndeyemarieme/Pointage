<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepointersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hrdep');
            $table->string('hrfin');
            $table->string('latitude');
            $table->string('logitude');
            $table->integer('employer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('employer_id')->references('id')->on('employers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pointers');
    }
}
