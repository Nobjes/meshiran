<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\User;//この行を上に追加
use App\Post;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $comments= Comment::all();
        return $comments;
    }


public function store(Request $request)
    { 
        
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'comment_text' => 'required|max:150'
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //登録処理
        $comment= new Comment;
        $comment->id = $request->id;
        $comment->comment_text= $request->$comment_text;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $comment ->save();  
    }
    
    
public function show(Comment $comment)
    {
         return $comment;
    }
    
    
public function update(Request $request, Comment $comment)
    {
        $comment= new Comment;
        $comment->id = $request->id;
        $comment->comment_text= $request->$comment_text;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment ->save();  
    }
    
    
public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
