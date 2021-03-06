<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Map;
use App\User;//この行を上に追加
use App\Post;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Http\Request;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
public function index()
    {
         $maps = Map::with(['restaurants'])->get();
         return $maps;
    }


public function store(Request $request)
    {
        $map = new Map;
        $map ->restaurant_adress = $request->restaurant_adress;
        $map ->post_id = $request->post_id;
        $map ->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $map ->follow_id = $request->follow_id;
        $map ->save();  
    }
    
    
public function show(Map $map)
    {
         return $map;
    }
    
    
public function update(Request $request, Map $map)
    {
        $map = new Map;
        $map ->restaurant_adress = $request->restaurant_adress;
        $map ->post_id = $request->post_id;
        $map ->user_id = $request->user_id;
        $map ->follow_id = $request->follow_id;
        $map ->save();  
    }
    
    
public function destroy(Map $map)
    {
         $map->delete();
    }
}
