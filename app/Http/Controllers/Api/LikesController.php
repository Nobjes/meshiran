<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Like;
use App\User;//この行を上に追加
use App\Post;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
         $likes = Like::all();
         return $likes;
    }


public function store(Request $request)
    {
        
        
        //登録処理
        $like = new Like;
        $like ->id = $request->id;
        $like ->post_id = $request->post_id;
        $like ->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $like ->save();  
    }
    
    
public function show(Like $like)
    {
         return $like;
    }
    
    
public function update(Request $request, Like $like)
    {
        $like = new Like;
        $like ->id = $request->id;
        $like ->post_id = $request->post_id;
        $like ->user_id = $request->user_id;
        $like ->save();  
    }
    
    
public function destroy(Like $like)
    {
         $like->delete();
    }
}
