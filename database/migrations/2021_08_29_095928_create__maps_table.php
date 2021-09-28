<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('follow_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('follow_id')->references('id')->on('follows')->onDelete('cascade');
            $table->unique(['user_id', 'post_id','restaurant_id','follow_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
       });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
     
    public function down()
    {
        Schema::dropIfExists('maps');
    }
}
