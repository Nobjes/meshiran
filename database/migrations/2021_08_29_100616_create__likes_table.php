<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // userが削除されたとき、それに関連するlikeも一気に削除される
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // postが削除されたとき、それに関連するlikeも一気に削除される
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
        Schema::dropIfExists('likes');
    }
}
