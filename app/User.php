<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; //追記


class User extends Authenticatable
{
    use HasApiTokens , Notifiable; //変更

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birthday','sex','u_country_id','u_prefecture_id','u_district','profile_image_url','profile_text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
// Postsテーブルとのリレーション （主テーブル側）
    public function my_posts() {
       return $this->hasMany('App\Post');
   }

    

//Mapsテーブルとのリレーション（Userが主テーブル）
public function my_maps() {
       return $this->hasMany('App\Map');
   }


//Likesテーブルとのリレーション（Userが主テーブル）
public function my_likes() {
       return $this->hasMany('App\Like');
   }


//Commerntsテーブルとのリレーション（Userが主テーブル）
public function my_comments() {
       return $this->hasMany('App\Comment');
   }


//Wantsテーブルとのリレーション（Userが主テーブル）
public function my_wants() {
       return $this->hasMany('App\Want');
   }


// Food_categoriesテーブルとの多対多のリレーション
     public function Food_categories () {
        return $this->belongsToMany('App\Food_category')->withTimestamps;
    }


//Moviesテーブルとのリレーション（Userが主テーブル）
public function my_movies() {
       return $this->hasMany('App\Movie');
   }


//Followsテーブルとのリレーション（Userが主テーブル）
public function follows() {
       return $this->belongsToMany('App\Follow');
   }
   

//Rankingsテーブルとのリレーション（Userが主テーブル）
public function rankings() {
       return $this->hasMany('App\Ranking');
   }


    
    
}
