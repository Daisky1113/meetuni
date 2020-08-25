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
    return view('home');
});

// 大学名チェック
Route::get('inst/search', 'InstsController@index');

Route::post('inst/search', 'InstsController@search')->name('inst.search');


//Authentification
Route::get('inst/register', 'Auth\RegisterController@showInstUserRegistrationForm')->name('instUser.regiform');

Route::post('inst/register', 'Auth\RegisterController@instUserRegister')->name('instUser.register');

Route::post('inst/logout', 'Auth\LoginController@instUserLogout')->name('instUser.logout');

Route::get('student/register', 'Auth\RegisterController@showStudentRegistrationForm');

Route::post('student/register', 'Auth\RegisterController@studentRegister')->name('student.regiter');

Route::post('student/logout', 'Auth\LoginController@studentLogout')->name('student.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 各種情報の取得
Route::get('/inst/fetch-user','InstUsersController@fetchUser');

Route::get('/inst/fetch-inst','InstUsersController@fetchInst');

Route::get('/inst/fetch-initials','InstUsersController@fetchInitials');

Route::get('/inst/fetch-events', 'InstUsersController@fetchEvents');

Route::get('/inst/fetch-single-event/{id}', 'InstUsersController@fetchSingleEvent');

Route::post('/inst/create-events/store', 'EventsController@store');

Route::get('/inst/fetch-levels', 'LevelsController@fetchLevels');

Route::get('/inst/fetch-subjects', 'SubjectsController@fetchSubjects');

Route::get('/inst/fetch-regions', 'RegionsController@fetchRegions');

Route::get('/inst/fetch-event-regions/{id}', 'RegionsController@fetchEventRegions');

Route::get('/inst/fetch-event-levels/{id}', 'LevelsController@fetchEventLevels');

Route::get('/inst/fetch-event-subjects/{id}', 'SubjectsController@fetchEventSubjects');

Route::get('/inst/event/current-info/{id}', 'EventsController@fetchEditEvent');

// テスト
// Route::post('/inst/test/store', 'ImagesController@store');
// Route::get('/inst/image/test', 'ImagesController@index');
// Route::get ('/inst/image/get', 'ImagesController@displayImage')-> name('inst.show');
// Route::get ('/inst/create-event', 'ImagesController@testshow')-> name('inst.show');
// Route::post('inst/region', 'RegionsController@test');
Route::get('/inst/testform', 'ImagesController@testform');
Route::post('/inst/testform/update', 'ImagesController@testformUpdate');
//テスト終わる

// Vue
//Only inst user can access.
Route::group(['middleware' => ['auth', 'can:inst-admin']], function(){
    Route::get('/inst/{any}', function () {
        return view('inst.main');
    })->where('any','.*');
});

