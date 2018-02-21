<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('username',255);
            
            $table->string('password',255);
            
            $table->string('email',255);
            
            $table->string('name',255);
            
            $table->longText('address')->nullable();
            
            $table->integer('mst_csub_id')->unsigned();
            $table->foreign('mst_csub_id')->references('id')->on('mst_csubs')->onDelete('cascade');
            
            $table->longText('message')->nullable();
            
            $table->integer('money')->nullable();
            
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
        Schema::dropIfExists('companies');
    }
}
