<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQceScaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qce_scale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qce_id')->unsigned();
            $table->integer('scale_id')->unsigned();

            $table->foreign('qce_id')->references('id')->on('qce')->onDelete('cascade');
            $table->foreign('scale_id')->references('id')->on('scales')->onDelete('cascade');
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
        Schema::drop('qce_scale');
    }
}
