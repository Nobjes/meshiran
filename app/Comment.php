<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //コメントの保護
    protected $fillable = ['comment_text'];

    
    // Userテーブルとのリレーション （従テーブル側）
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    // Postテーブルとのリレーション （従テーブル側）
    public function post() {
        return $this->belongsTo('App\Post');
    }



}
