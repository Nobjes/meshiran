<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Want;
use App\User;//この行を上に追加
use App\Post;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Http\Request;

class WantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $wants = Want::all();
        return $wants;
    }


public function store(Request $request)
    {
        $want = new Want;
        $want->id = $request->id;
        $want->post_id = $request->post_id;
        $want->user_id = $request->user_id;
        $want->save();  
    }
    
    
public function show(Want $want)
    {
         return $want;
    }
    
    
public function update(Request $request, Want $want)
      {
        $want = new Want;
        $want->id = $request->id;
        $want->post_id = $request->post_id;
        $want->user_id = $request->user_id;
        $want->save();  
    }
    
    
public function destroy(Want $want)
    {
         $want ->delete();
    } 
}
