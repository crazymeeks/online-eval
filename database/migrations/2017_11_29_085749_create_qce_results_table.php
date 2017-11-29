<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qce_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qce_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->string('qce_category');
            $table->text('qce_category_question');
            $table->string('evaluator');
            $table->integer('scale')->unsigned();
            $table->date('rating_period_from');
            $table->date('rating_period_to');

            $table->foreign('qce_id')->references('id')->on('qce')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculty')->onDelete('cascade');

            $table->index(['qce_id', 'faculty_id']);
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
        Schema::drop('qce_results');
    }
}
