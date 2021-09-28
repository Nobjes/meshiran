<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_category extends Model
{
    //Userテーブルとの多対多のリレーション（Food_categoriesが主テーブル）
    public function users()
    {
      	  return $this->belongsToMany('App\User')->withTimestamps();
    }

    // Restaurantsテーブルとのリレーション （主テーブル側）
    public function restaurants () {
        return $this->hasMany('App\ Restaurant');
    }
    
    //Rankingsテーブルとのリレーション（主テーブル側）
    public function rankings () {
       return $this->hasMany('App\Ranking');
 }   


}
