<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMstDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mst_degrees');
        Schema::create('mst_degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('rank');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_degrees');
    }
}
