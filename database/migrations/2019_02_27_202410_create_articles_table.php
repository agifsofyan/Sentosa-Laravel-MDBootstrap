<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_ID');
            $table->text('post_title');
            $table->string('post_slug');
            $table->longText('post_content');
            $table->integer('category_ID')->unsigned();
            $table->string('statuses');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('category_ID')
                  ->references('id')
                  ->on('categories')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
