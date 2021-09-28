<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('post_text',150)->nullable;
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id'); 
            $table->integer('restaurant_score');
     	    
     	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->unique(['user_id','restaurant_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
