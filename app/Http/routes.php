<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'MessagesController@index');
// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');
Route::post('update', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController');
    Route::get('password/{id}',   'UsersController@password');
    Route::get('avatar/{id}',   'UsersController@avatar');
    Route::get('messagelist/{id}',   'UsersController@messagelist');
    Route::get('profile', 'UsersController@index');
    Route::get('profile/{id}', 'UsersController@profile')->name('users.profile');

    Route::resource('messages', 'MessagesController');
    Route::get("list",	'MessagesController@messagelist' )->name('message.list');
    Route::post('upload',"MessagesController@upload")->name('upload.post');

     Route::group(['prefix' => 'users/{id}'], function () { 
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });       
    
    Route::resource('coment', 'ComentsController', ['only' => ['store', 'destroy']]);
    
     Route::group(['prefix' => 'messages/{id}'], function () { 
        Route::get('favarite', 'MessageFavoriteControler@index')->name('favorite.list');
        Route::post('favorite', 'MessageFavoriteControler@store')->name('message.favorite');
        Route::delete('unfavarite', 'MessageFavoriteControler@destroy')->name('message.unfavarite');
        Route::get('favaritings', 'MessageFavoriteControler@favaritings')->name('message.favaritings');
        Route::get('favariteds', 'MessageFavoriteControler@favariteds')->name('message.favariteds');
    });       
    
});