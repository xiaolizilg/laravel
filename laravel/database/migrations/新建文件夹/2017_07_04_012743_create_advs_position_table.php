<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvsPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advs_position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('广告标识');
            $table->string('title')->comment('广告标题');
            $table->string('desc')->comment('描述');
            $table->unsignedTinyInteger('status')->comment('状态');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advs_position');
    }
}
