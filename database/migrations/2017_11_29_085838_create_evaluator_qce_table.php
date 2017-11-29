<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluatorQceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluator_qce', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluator_id')->unsigned();
            $table->integer('qce_id')->unsigned();

            $table->foreign('evaluator_id')->references('id')->on('evaluators')->onDelete('cascade');
            $table->foreign('qce_id')->references('id')->on('qce')->onDelete('cascade');
            $table->index(['evaluator_id', 'qce_id']);
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
        Schema::drop('evaluator_qce');
    }
}
