<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qce', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appendix')->nullable()->comment('Sample content: Appendix B');
            $table->string('nbc_number')->comment('The QCE of the NBC No');
            $table->string('title')->nullable()->comment('Instrument for Instructor/Teaching Effectivenes');
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
        Schema::drop('qce');
    }
}
