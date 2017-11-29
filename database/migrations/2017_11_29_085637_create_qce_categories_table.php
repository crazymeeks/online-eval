<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qce_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qce_id')->unsigned()->comment('Primary key of qce table');
            $table->string('name')->unique();
            $table->string('index')->nullable()->comment('Example: A');

            $table->foreign('qce_id')->references('id')->on('qce')->onDelete('cascade');
            $table->index(['qce_id']);
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
        Schema::drop('qce_categories');
    }
}
