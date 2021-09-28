<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    
// Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\User');
    }
    
// Postテーブルとのリレーション （主テーブル側）
    public function posts() {
        return $this->hasMany('App\Post');
    }
    
//Areasテーブルとのリレーション　MapはひとつのAreaに紐づく （従テーブル側）
    public function area () {
       return $this->belongsTo('App\Area');
 } 
    
    
// Restaurantsテーブルとのリレーション （主テーブル側）
    public function restaurants () {
        return $this->hasMany('App\ Restaurant');
    }

    

}
