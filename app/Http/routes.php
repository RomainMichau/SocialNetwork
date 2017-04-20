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

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/about', 'UserController@show')->name('about');
Route::get('/profil', 'UserController@edit');
Route::post('/profil', 'UserController@update');
Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
    Route::resource('mur', 'MurController', ['except' => ['store']]);
    Route::post('mur/{post}', 'MurController@store');
    Route::delete('likes/{post}', 'LikesController@destroy')->name('admin.likes.destroy');
    Route::delete('comments/{post}', 'CommentsController@destroy')->name('admin.comments.destroy');
    Route::resource('posts', 'PostsController');
    Route::resource('photos', 'PhotosController');
    Route::resource('videos', 'VideosController');
    Route::resource('events', 'EventsController');
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]);
        Route::delete('users/{user}', 'UsersController@destroy')->name('admin.users.destroy')->middleware('super');
    Route::resource('friends', 'FriendsController', ['except' => ['update', 'create']]);
        Route::put('friends/{friends}/{status}', 'FriendsController@update')->name('admin.friends.update');
        Route::get('friends/{friends}', 'FriendsController@create')->name('admin.friends.create');
});
