<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
   // Userテーブルとのリレーション （従テーブル側）
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    
    //Mapsテーブルとのリレーション->Postは一つのMapに紐づく （従テーブル側）
    public function map() {
       return $this->belongsTo('App\Map');
       
    }
       
    //Likesテーブルとのリレーション->Postは複数のLikeを持つ （主テーブル側）
    public function likes() {
       return $this->hasMany('App\Like');
    }   

   
    //Commentsテーブルとのリレーション->Postは複数のCommentを持つ （主テーブル側）
    public function comments() {
       return $this->hasMany('App\Comment');
    }  
    
    //Wantsテーブルとのリレーション->Postは複数のWantを持つ （主テーブル側）
    public function wants() {
       return $this->hasMany('App\Want');
    }  

   // Restaurant_scoresテーブルとのリレーション->Postは一つのRestaurant_scoreに紐づく（従テーブル側）
    public function restaurant_score() {
       return $this->belongsTo('App\Restaurant_score');
     }   
 

    // Moviesテーブルとのリレーション->Postは1つのMovieを持つ （主テーブル側）
    public function movie () {
       return $this->hasOne('App\Movie');
     }   


    // Rankingsテーブルとのリレーション->Postは複数のRankingを持つ （主テーブル側）
    public function rankings () {
       return $this->hasMany('App\Ranking');
    }   



}
