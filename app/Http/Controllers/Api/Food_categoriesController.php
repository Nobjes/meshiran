<?php

namespace App\Http\Controllers\Api;

use App\Food_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Food_categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $food_categories= Food_category::all();
        return $food_categories;
    }


public function store(Request $request)
    {
        $food_category = new Food_category;
        $food_category->id = $request->id;
        $food_category->food_category_name = $request->food_category_name;
        $food_category->save();  
    }
    
    
public function show(Food_category $food_category)
    {
         return $food_category;
    }
    
    
public function update(Request $request, Food_category $food_category)
      {
        $food_category = new Food_category;
        $food_category->id = $request->id;
        $food_category->food_category_name = $request->food_category_name;
        $food_category->save();  
    }
    
    
public function destroy(Food_category $food_category)
    {
        $food_category->delete();
    } 
}
