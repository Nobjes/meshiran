<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ranking;
use Illuminate\Http\Request;
use App\User;//この行を上に追加
use App\Post;//この行を上に追加
use App\Food_category;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追
class RankingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $rankings = Ranking::all();
        return $rankings;
    }


public function store(Request $request)
    {
        $ranking = new Ranking;
        $ranking->id = $request->id; 
        $ranking->food_category_id = $request->food_category_id;
        $ranking->post_id = $request->post_id;
        $ranking->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $ranking->restaurant_score = $request->restaurant_score;
        $ranking ->save();  
    }
    
    
public function show(Ranking $ranking)
    {
        return $ranking;
    }
    
    
public function update(Request $request, Ranking $ranking)
      {
        $ranking = new Ranking;
        $ranking->id = $request->id; 
        $ranking->food_category_id = $request->food_category_id;
        $ranking->post_id = $request->post_id;
        $ranking->user_id = $request->user_id;
        $ranking->restaurant_score = $request->restaurant_score;
$ranking ->save();  
    }
    
    
public function destroy(Ranking $ranking)
    {
         $ranking ->delete();
    } 
}
