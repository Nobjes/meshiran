<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('movie_url');
            $table->binary('movie_data');
            $table->tinyInteger('movie_type')->comment('ムービーの種類／1:mp4 2:mov 3:others');
            $table->integer('movie_size');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('post_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unique(['user_id', 'post_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
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
        Schema::dropIfExists('movies');
    }
}
