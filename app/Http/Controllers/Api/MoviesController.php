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
    //$this->middleware('auth');
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
        //バリデーション
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'movie_url' => 'file|max:10240',
            ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            // return redirect('/')
            // ->withInput()
            // ->withErrors($validator);
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $movie_org_filename = "";
        if($request->file('movie_url')){
            if ($request->file('movie_url')->isValid([])) {
                $filesize = $request->file('movie_url')->getSize();
                $filename = $request->file('movie_url')->store('public/movie_org');
                $movie_fullpath = storage_path() . '/' . $filename;
                $movie_org_filename = basename($filename);
            }
        }

        $duration = FFMpeg\FFProbe::create()->format($movie_fullpath)->get('duration');
        if($duration > 15){
            return response()->json([
                'status' => 400,
                'errors' => "最大動画秒数は15秒を超えています"
            ], 400);
        }

    
        $movie= new Movie;
        //$movie ->id = $request->id;

        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($movie_fullpath);
        $format = new FFMpeg\Format\Video\X264();
        $format->setAudioCodec("libmp3lame");
        $video->save($format, storage_path() . '/public/movie/' . $movie_org_filename . ".mp4"); 


        $movie ->movie_url= $movie_org_filename . ".mp4";
        $movie ->movie_type = pathinfo($movie_fullpath, PATHINFO_EXTENSION);
        $movie->movie_size = $filesize;
        $movie->post_id = $request->post_id;
        $movie->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $movie->save();  

        return response()->json([
            'status' => 200,
            'movie' => $movie
        ], 400);
        
    
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
        $target_path = public_path('/movie/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);

    }else{

        return redirect('/home');
    }

    return redirect('/movie');

}

}
