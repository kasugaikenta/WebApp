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

Route::get('/', function () {
    return view('welcome');
});

//質問投稿画面へ
Route::get('/question', 'QuestionsController@question');

Route::post('/question_save', 'QuestionsController@sendQuestion');

//回答投稿画面へ
Route::get('/answer/{question_id}', 'QuestionsController@answer');

Route::post('/question/{question_id}/answer', 'QuestionsController@sendAnswer');