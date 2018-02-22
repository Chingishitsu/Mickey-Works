<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('students');
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email');
            $table->string('name');
            $table->date('birth');
            $table->integer('mst_degree_id')->unsigned();
            $table->foreign('mst_degree_id')->references('id')->on('mst_degrees');
            $table->integer('mst_ssub_id')->unsigned();
            $table->foreign('mst_ssub_id')->references('id')->on('mst_ssubs');
            $table->longtext('message');
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
        Schema::dropIfExists('students');
    }
}
