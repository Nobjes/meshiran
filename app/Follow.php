<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
    public function user() {
        return $this-> belongsToMany ('App\User');
    }

}
