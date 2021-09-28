<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
    public function user() {
        return $this->belongsTo('App\User');
    }


    // Postテーブルとのリレーション （従テーブル側）
    public function post () {
        return $this->belongsTo('App\Post');
    }





}
