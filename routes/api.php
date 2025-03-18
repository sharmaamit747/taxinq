
<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/news_list', 'ApiController@news_list')->name('/api/news_list');
Route::post('/news', 'ApiController@news')->name('/api/news');
Route::post('/comments', 'ApiController@comments')->name('/api/comments');
Route::post('/post_comment', 'ApiController@post_comment')->name('/api/post_comment');
Route::get('/blog_list', 'ApiController@blog_list')->name('/api/blog_list');
Route::post('/blog_detail', 'ApiController@blog_detail')->name('/api/blog_detail');
