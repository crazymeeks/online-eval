<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQceCategoryQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qce_category_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qce_category_id')->unsigned();
            $table->text('description');
            $table->integer('sort_order')->default(0);

            $table->foreign('qce_category_id')->references('id')->on('qce_categories')->onDelete('cascade');
            $table->index(['qce_category_id']);
            
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
        Schema::drop('qce_category_questions');
    }
}
