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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin', 'AdminController');
Route::resource('event', 'EventController');
Route::post('event/list', 'EventController@list')->name('event.list');
Route::resource('event.speaker', 'SpeakerController');
Route::resource('event.schedule', 'ScheduleBlockController');
Route::resource('event.question', 'QuestionController');
Route::post('event/{event}/question/{question}/reply', 'QuestionController@reply')
    ->name('event.question.reply');
