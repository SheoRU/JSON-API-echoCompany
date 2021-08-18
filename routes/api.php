<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAction;
use App\Http\Controllers\AuthorContorller;
use App\Http\Controllers\CategoryContorller;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'articles'=> ArticleAction::class,
    'authors'=> AuthorContorller::class,
    'categories'=> CategoryContorller::class,
]);
Route::get('articles/search/{field}/{value}',[ArticleAction::class,'search']);
Route::get('authors/search/{field}/{value}',[AuthorContorller::class,'search']);
Route::get('categories/search/{field}/{value}',[CategoryContorller::class,'search']);
Route::get('articles/sort/{value}',[ArticleAction::class,'sort']);
Route::get('authors/sort/{value}',[AuthorContorller::class,'sort']);
Route::get('categories/sort/{value}',[CategoryContorller::class,'sort']);




