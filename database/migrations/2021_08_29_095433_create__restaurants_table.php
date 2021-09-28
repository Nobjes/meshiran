<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('restaurant_name');
            $table->tinyInteger('r_country_id')->default(1)->comment('国名／1:日本 2:韓国 3:中国 4:台湾 5:香港 6:フィリピン 7:シンガポール 8:マレーシア 9:インドネシア 10:ベトナム 11:カンボジア 12:インド 13:マカオ 14:タイ 15:アメリカ 16:オーストラリア 17:カナダ 18:イギリス 19:フランス 20:ドイツ 21:イタリア 22:スペイン 23:メキシコ 24:アルゼンチン 25:ブラジル 99:その他');
            $table->tinyInteger('r_prefecture_id')->default(13)->comment('都道府県別／1:北海道 2:青森 3:岩手 4:宮城 5:秋田 6:山形 7:福島 8:茨城 9:栃木 10:群馬 11:埼玉 12:千葉 13:東京 14:神奈川 15:新潟 16:富山 17:石川 18:福井 19:山梨 20:長野 21:岐阜 22:静岡 23:愛知 24:三重 25:滋賀 26:京都 27:大阪 28:兵庫 29:奈良 30:和歌山 31:鳥取 32:岡山 33:島根 34:広島 35:山口 36:徳島 37:香川 38:愛媛 39:高知 40:福岡 41:佐賀 42:長崎 43:熊本 44:大分 45:宮崎 46:鹿児島 47:沖縄 48:その他');
            $table->string('r_district')->nullable;
            $table->unsignedBigInteger('food_category_id');
            $table->string('restaurant_adress');
            $table->string('opening_hours');
     	    $table->string('phone_number');
            $table->string('closed_day');
            $table->tinyInteger('eatin_takeout')->comment('イートインかテイクアウト／1:イートイン 2:テイクアウト');
            
            $table->foreign('food_category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->unique(['food_category_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
