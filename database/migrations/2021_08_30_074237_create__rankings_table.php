<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('ranking_number');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('food_category_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('food_category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->unique(['user_id', 'post_id','food_category_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
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
        Schema::dropIfExists('rankings');
    }
}
