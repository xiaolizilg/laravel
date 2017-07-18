<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cateogy', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->comment('分类标识');  
                $table->string('title')->comment('分类标题');
                $table->integer('pid')->unsigned()->default('0')->comment('父级ID');
                $table->tinyInteger('status')->unsigned()->default('0')->comment('状态1显示,0禁用');
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
       Schema::drop('category');
    }
}
