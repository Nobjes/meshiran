<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;


class ImagesController extends Controller
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

     
     
 //画像アップローダー表示
public function index(){

     $user = Auth::user();

    return view('image_upload',[
        'user'=>$user
        ]);

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }


// 画像アップロード処理
public function upload(Request $request){

   // バリデーション 
    $validator = $request->validate( [
        'image' => 'required|file|image|max:2048', 
    ]);

    // 画像ファイル取得
    $file = $request->image;

    // ログインユーザー取得
    $user = Auth::user();

    if ( !empty($file) ) {

        // ファイルの拡張子取得
        $ext = $file->guessExtension();

        //ファイル名を生成
        $fileName = Str::random(32).'.'.$ext;

        // 画像のファイル名を任意のDBに保存
        $user->image_url = $fileName;
        $user->save();

        //public/uploadフォルダを作成
        $target_path = public_path('/uploads/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);

    }else{

        return redirect('/home');
    }

    return redirect('/image');

}

}