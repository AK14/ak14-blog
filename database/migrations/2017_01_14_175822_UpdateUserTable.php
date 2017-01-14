<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users',function(Blueprint $table){
           $table->tinyInteger('weight')->unsigned()->nullable();
           $table->tinyInteger('height')->unsigned()->nullable();
           $table->enum('role',['admin','registered','player'])->default('registered');
           $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function($table){
           $table->dropColumn(array('weight','height','role','phone'));
        });
    }
}
