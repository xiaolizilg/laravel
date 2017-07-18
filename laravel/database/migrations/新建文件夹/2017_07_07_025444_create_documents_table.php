<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('document', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('cate_id')->unsigned()->default('0')->comment('分类id');
                $table->string('desc')->nullable()->comment('描述');
                $table->integer('cover_id')->unsigned()->default('0')->comment('封面id');
                $table->tinyInteger('status')->unsigned()->default('0')->comment('状态1显示,0禁用');
               
                $table->text('content')->comment('内容');
                $table->string('keywords')->nullable()->comment('关键字');
                $table->string('seo_title')->nullable()->comment('seo标题');
                $table->string('seo_description')->nullable()->comment('seo描述');
                 $table->integer('view')->unsigned()->default('0')->comment('点击量');
              //  $table->timestamp('deleted_at');
                //$table->timestamps();
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
          Schema::drop('document');
    }
}
