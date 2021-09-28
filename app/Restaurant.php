<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    // Postテーブルとのリレーション （主テーブル側）
    public function posts() {
        return $this->hasMany('App\Post');
    }
    
    
    
    //Mapsテーブルとのリレーション（従テーブル側）
    public function map () {
       return $this->belongsTo('App\Map');
 }  
 
 
 // Food_categoriesテーブルとのリレーション（従テーブル側）
    public function food_category() {
       return $this->belongsTo('App\ Food_category');
 }   



}
