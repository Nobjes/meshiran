<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;//この行を上に追加
use App\Restaurant;//この行を上に追加
use App\Movie;//この行を上に追加
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;//この行を上に追
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
         $posts = Post::all();
         return $posts;
    }



public function store(Request $request)
    {
        
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'post_text' => 'required|max:150'
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
         //登録処理
        $post = new Post;
        $post->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $post->restaurant_id = $request->restaurant_id;
        $post->restaurant_score = $request->restaurant_score;
        $post->post_text = $request->post_text;
        $post->movie_id = $request->movie_id;
        var_dump($post->toArray());
        exit;
        $post->save();
    }
    
    
public function show(Post $post)
    {
         return $post;
    }
    
    
public function update(Request $request, Post $post)
    {
$post = new Post;
        $post->user_id = $request->user_id;
        $post->restaurant_id = $request->restaurant_id;
        $post->restaurant_score = $request->restaurant_score;
        $post->post_text = $request->post_text;
        $post->movie_id = $request->movie_id;
        $post-> id = $request->id;
        $post->save();  
        return $post;
    }
    
    
public function destroy(Post $post)
    {
         $post->delete();
    }
    


//Like処理
public function like($post_id){
    
    //ログイン中のユーザー取得
    $user = Auth::user();
    
    //お気に入りの投稿
    $post = Post::find($post_id);
    
    //リレーションの登録
    $post->like_user()->attach($user);
    
    return redirect('/');
    
}    



//Want処理
public function want($post_id){
    
    //ログイン中のユーザー取得
    $user = Auth::user();
    
    //お気に入りの投稿
    $post = Post::find($post_id);
    
    //リレーションの登録
    $post->want_user()->attach($user);
    
    return redirect('/');
    
}    
    
    
}
