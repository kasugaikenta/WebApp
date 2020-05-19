<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

//質問表示画面（1つの質問の詳細画面）へ
Route::get('/detail/{question_id}', 'QuestionsController@detail');

//質問投稿画面へ
Route::get('/question', 'QuestionsController@question');

//回答投稿画面へ
Route::get('/answer/{question_id}', 'AnswersController@answer');

//質問記録
Route::post('/questionsave', 'QuestionsController@sendQuestion');

//回答記録
Route::post('/question/{question_id}/answer', 'AnswersController@sendAnswer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


