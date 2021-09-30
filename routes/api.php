<?php

use App\User;
use App\Comment;
use App\Follow;
use App\Food_category;
use App\Image;
use App\Like;
use App\Map;
use App\Movie;
use App\Post;
use App\Ranking;
use App\Restaurant;
use App\Restaurant_score;
use App\Want;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// users用のAPIルーティング
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); //変更した部分
    

});


// posts用のAPIルーティング
Route::group(['middleware' => ['auth:api']], function(){

Route::resource('posts', 'Api\PostsController' , ['except' => ['create', 'edit'] ]);


// Restaurants用のAPIルーティング
Route::resource('restaurants', 'Api\RestaurantsController' , ['except' => ['create', 'edit'] ]);


// Maps用のAPIルーティング
Route::resource('maps', 'Api\MapsController' , ['except' => ['create', 'edit'] ]);


// Likes用のAPIルーティング
Route::resource('likes', 'Api\LikesController' , ['except' => ['create', 'edit'] ]);



// Comments用のAPIルーティング
Route::resource('comments', 'Api\CommentsController' , ['except' => ['create', 'edit'] ]);



// Wants用のAPIルーティング
Route::resource('wants', 'Api\WantsController' , ['except' => ['create', 'edit'] ]);



// Food_categories用のAPIルーティング
Route::resource('food_categories', 'Api\Food_categoriesController' , ['except' => ['create', 'edit'] ]);



// Movies用のAPIルーティング
Route::resource('movies', 'Api\MoviesController' , ['except' => ['create', 'edit'] ]);



// Follows用のAPIルーティング
Route::resource('follows', 'Api\FollowsController' , ['except' => ['create', 'edit'] ]);



// Rankings用のAPIルーティング
Route::resource('rankings', 'Api\RankingsController' , ['except' => ['create', 'edit'] ]);



// Images用のAPIルーティング
Route::resource('images', 'Api\ImagesController' , ['except' => ['create', 'edit'] ]);




//画像アップロード画面表示
Route::get('/images','Api\UsersController@index');

//画像アップロード処理
Route::post('/images/upload','Api\ImagesController@upload');


//動画アップロード画面表示
Route::get('/movies', 'Api\MoviesController@index');

//動画アップロード処理
Route::post('/movies/upload','Api\MoviesController@upload');

});


//login用のルーティング
Route::post('login', 'Api\AuthController@login');
 