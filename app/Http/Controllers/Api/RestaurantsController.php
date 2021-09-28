<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Food_category;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
         $restaurants = Restaurant::all();
         return $restaurants;
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
        $restaurant = new Restaurant;
        $restaurant->id = $request->id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->r_country_id = $request->r_country_id;
        $restaurant->r_prefecture_id = $request->r_prefecture_id;
        $restaurant->r_district = $request->r_district;
        $restaurant->food_category_id = $request-> food_category_id;
        $restaurant->restaurant_adress= $request-> restaurant_adress;
        $restaurant->opening_hours = $request-> opening_hours;
        $restaurant->phone_number = $request-> phone_number; 
        $restaurant->closed_day= $request-> closed_day;
        $restaurant->eatin_takeout = $request-> eatin_takeout;
        $restaurant->save();  
    }
    
    
public function show(Post $post)
    {
         return $restaurant;
    }
    
    
public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant = new Restaurant;
        $restaurant->id = $request->id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->r_country_id = $request->r_country_id;
        $restaurant->r_prefecture_id = $request->r_prefecture_id;
        $restaurant->r_district = $request->r_district;
        $restaurant->food_category_id = $request-> food_category_id;
        $restaurant->restaurant_adress= $request-> restaurant_adress;
        $restaurant->opening_hours = $request-> opening_hours;
        $restaurant->phone_number = $request-> phone_number; 
        $restaurant->closed_day= $request-> closed_day;
        $restaurant->eatin_takeout = $request-> eatin_takeout;
        $restaurant->save();     
}
    
    
public function destroy(Restaurant $restaurant)
    {
         $restaurant->delete();
    }
}