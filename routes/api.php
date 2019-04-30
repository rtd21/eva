<?php

use App\Http\Middleware\CheckAccessToken;
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

Route::post('login', 'API\PassportController@login');

Route::middleware('client')->group(function () {
    Route::post('speaker/{speaker}/like', 'API\SpeakerController@like');
    Route::post('question/{question}/updateVote', 'API\QuestionController@updateVote');
    Route::apiResources([
        'users' => 'API\UserController',
        'questions' => 'API\QuestionController',
        'ratings' => 'API\RatingController',
        'multiple_choices' => 'API\MultipleChoiceController',
        'free_entries' => 'API\FreeEntryController',
        'tag_clouds' => 'API\TagCloudController',
        'schedules' => 'API\ScheduleBlockController'
    ]);
});
