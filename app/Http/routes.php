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
//Authentication Routes
Route::get('auth/login',['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout',['as' =>'logout','uses'=>'Auth\AuthController@getLogout']);
//Registraion Routes

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

//Password Reset Routes
Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::get('password/reset','Auth\PasswordController@reset');
//Categories
Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);
//Comments

Route::Post('comments/{post_id}',['uses'=>'CommentController@store','as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentController@edit','as'=>'comments.edit']);
Route::Put('comments/{id}',['uses' => 'CommentController@update','as'=>'comments.update']);
Route::get('comments/{id}/delete',['uses'=>'CommentController@delete','as'=>'comments.delete']);
Route::delete('comments/{id}',['uses' => 'CommentController@destroy','as'=>'comments.destroy']);


Route::get('/', 'PagesController@getIndex');
Route::get('blog/{slug}',['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::resource('posts','PostController');
Route::auth();

Route::get('/home', 'HomeController@index');
