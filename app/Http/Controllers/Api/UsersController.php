<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Auth;//この行を上に追加
use Validator;//この行を上に追
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function store(Request $request)
    {
    
    //バリデーション
    $validator = Validator::make($request->all(), [
    'name' => 'required|unique:posts|max:30',
    'profile_image_url' => 'nullable|file|image|mimes:jpg,jpeg,png',
    'birthday' => 'required',
    'sex' => 'required',
    'email' => 'required|max:255',
    'password' => 'required|max:30',
    'u_country_id' => 'required',
    'u_prefecture_id' => 'nullable',
    'u_district' => 'nullable',
    'profile_text' => 'nullable|string|max:150'
    ]);
    
   
   
     // 画像ファイル取得
    $file = $request->profile_image_url;

    /*
    // ログインユーザー取得
    $user = Auth::user();
    */
  
    //バリデーション:エラー 
    if ($validator->fails()) {
    return redirect('/')
    ->withInput()
    ->withErrors($validator);
    }
    
    /*
    // リクエストから写真を取得→storege->app->public直下のimageフォルダに保存（あぶさんのコード）
        $u_image = $request->file('u_image')->store('public/image');
        //
        $u_image = str_replace('public/image/', '', $u_image);
        // DBに保存
        $user->u_image = $u_image;
    */
    
    
    //以下に登録処理を記述（Eloquentモデル）
    $user = new User;
    $user->$request->id;
    $user->name =$request->name;
    
     //public/uploadフォルダを作成
    $target_path = public_path('/upload/');

    
    // ファイルの拡張子取得
    //$ext = $file->guessExtension();

    //ファイル名を生成
    //$fileName = Str::random(32).'.'.$ext;
    
    
    //ファイルをpublic/uploadフォルダに移動
    $file->move($target_path,$file);


    // 画像のファイル名を任意のDBに保存
    $user->profile_image_url = $file;
    $user->birthday = $request->birthday;
    $user->sex = $request->sex;
    $user->email = $request->email;
    $user->password = $request->password; 
    $user->u_country_id = $request-> u_country_id;
    $user->u_prefecture_id = $request-> u_prefecture_id;
    $user->u_district = $request-> u_district;
    $user->profile_text = $request-> profile_text;
    $user->save();  
    
   
return view ('/login',[
    'users' => $users
    ]);
    

}



    
public function show(User $user)
    {
        return $user;
    }
    
public function update(Request $request, User $user)
    {
        $user = new User;
        $user->$request->id;
        $user->name =$request->name;
        $user->profile_image_url = $request->profile_image_url;
        $user->birthday = $request->birthday;
        $user->sex = $request->sex;
        $user->email = $request->email;
        $user->password = $request->password; 
        $user->area_id = $request-> area_id;
        $user->profile_text = $request-> profile_text;
        $user->save();  
        return $user;
    }
    
public function destroy(User $user)
    {
        $user->delete();
    }

}


