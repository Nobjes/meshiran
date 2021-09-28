<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('food_category_name')->comment('料理ジャンル／1:焼肉 2:寿司 3:和食 4:焼き鳥 5:ラーメン 6:カレー 7:ハンバーガー 8:ファーストフード 9:海鮮系 10:丼モノ 11:定食 12:鉄板焼き 13:ステーキ 14:BBQ 15:肉料理 16:鍋 17:おでん 18:洋食 19:そば 20:うどん 21:麺類 22:天ぷら 23:ピザ 24:中華 25:イタリアン 26:韓国料理 27:フレンチ 28:アジアンエスニック 29:メキシカン 30:スペイン料理 31:南米料理 32:アフリカ料理 33:ビーガン 34:パン 35:サラダ 36:スープ 37:日本酒 38:ワイン 39:カフェ 40:BAR 41:スイーツ 42:その他');
              });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_categories');
    }
}
