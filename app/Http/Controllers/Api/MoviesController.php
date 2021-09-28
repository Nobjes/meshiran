<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

//ログインユーザーのみ使える機能にする　これを追加する！順番重要です！最初にログイン確認です。
public function __construct()
{
    $this->middleware('auth');
}

 

public function index()
    {
        $movies= Movie::all();
        return $movies;
        
        $user = Auth::user();             //後から追加した動画のアプロード記述追記
        return view('movie_upload',[
        'user'=>$user                  
        ]);
        
        
        }    



public function store(Request $request)
    {
        $movie= new Movie;
        $movie ->id = $request->id;
        $movie ->movie_url= $request->movie_url;
        $movie ->movie_type = $request->movie_type;
        $movie->movie_size = $request->movie_size; 
        $movie->post_id = $request->post_id;
        $movie->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $movie->save();  
        
     /*   $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open('path/to/movie.mov');
        $format = new FFMpeg\Format\Video\X264();
        $format->setAudioCodec("libmp3lame");
        $video->save($format, 'path/to/movie.mp4'); */
    }
    
    
public function show(Movie $movie)
    {
        return $movie;
    }
    
    
public function update(Request $request, Movie $movie)
   {
        $movie= new Movie;
        $movie ->id = $request->id;
        $movie ->movie_url= $request->movie_url;
        $movie ->movie_type = $request->movie_type;
        $movie->movie_size = $request->movie_size; 
        $movie->post_id = $request->post_id;
        $movie->user_id = $request->user_id;
        $movie->save();  
        
        
    }
    
    
public function destroy(Movie $movie)
    {
        $movie->delete();
    }



// 動画アップロード処理
public function upload(Request $request){

   // バリデーション 
    $validator = $request->validate( [
        'movie' => 'required|file|movie|max:2048', 
    ]);

    // 動画ファイル取得
    $file = $request->movie;

    // ログインユーザー取得
    $user = Auth::user();

    if ( !empty($file) ) {

        // ファイルの拡張子取得
        $ext = $file->guessExtension();

        //ファイル名を生成
        $fileName = Str::random(32).'.'.$ext;

        // 動画のファイル名を任意のDBに保存
        $user->movie_url = $fileName;
        $user->save();

        //public/uploadフォルダを作成
        $target_path = public_path('/uploads/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);

    }else{

        return redirect('/home');
    }

    return redirect('/movie');

}

}
