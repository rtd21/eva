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

Route::post('event/list', 'EventController@list')->name('event.list');

Route::middleware('auth')->group(function () {
    Route::resources([
        'admin' => 'AdminController',
        'event' => 'EventController',
        'event.speaker' => 'SpeakerController',
        'event.schedule' => 'ScheduleBlockController',
        'event.question' => 'QuestionController',
        'event.rating' => 'RatingController',
        'event.multiple_choice' => 'MultipleChoiceController',
        'event.free_entry' => 'FreeEntryController',
        'event.tag_cloud' => 'TagCloudController'
    ]);
    Route::post('event/{event}/question/{question}/reply', 'QuestionController@reply')
        ->name('event.question.reply');
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 1,
        'redirect_uri' => 'http://google.com',
        'response_type' => 'token',
        'scope' => '',
    ]);

    return redirect('http://eva8.ru/oauth/authorize?'.$query);
});
