<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matching', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->longText('student_comment')->nullable();

            $table->longText('company_comment')->nullable();

            $table->integer('result_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('mst_results')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matching');
    }
}
