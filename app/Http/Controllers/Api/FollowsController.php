<?php

namespace App\Http\Controllers\Api;

use App\Follow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
         $follows= Follow::all();
         return $follows;
    }


public function store(Follow $follow)
    {
        $follow = new Follows;
        $follow->following_user_id = $request->following_user_id;
        $follow->Followed_user_id = $request->followed_user_id;
        $follow->save();  
    }
    
public function show(Follow $follow)
    {
        return $follow;
    }
    
    
public function update(Request $request, Follow $follow)
      {
        $follow = new Follows;
        $follow->following_user_id = $request->following_user_id;
        $follow->Followed_user_id = $request->followed_user_id;
        $follow->save();  
    }
    
    
public function destroy(Follow $follow)
    {
         $follow->delete();
    } 
}
