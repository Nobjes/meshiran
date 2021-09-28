<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    // Postテーブルとのリレーション （従テーブル側）
     public function post () {
        return $this->belongsTo('App\Post');
    }


    // Food_categoriesテーブルとのリレーション （従テーブル側）
    public function food_category() {
        return $this->belongsTo('App\ Food_category');
    }

    
}
