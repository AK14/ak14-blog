<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_comments', function (Blueprint $table) {
            $table->integer('id_articles')->unsigned()->nullable();
            $table->integer('id_comments')->unsigned()->nullable();

            $table->foreign('id_comments')
                ->references('id')->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_articles')
                ->references('id')->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_comments');
    }
}
