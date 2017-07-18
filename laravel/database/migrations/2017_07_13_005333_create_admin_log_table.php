<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admin_log', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->default('0')->comment('用户id');  
                $table->string('desc')->comment('操作描述');  
                $table->integer('ip')->unsigned()->default('0')->comment('操作ip');
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
        Schema::drop('admin_log');
    }
}
