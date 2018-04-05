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
// Blog
//Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single'])->where('slug', '[\w\d\-\_]+'); // Regular expression of URL format '[\w\d\-\_]+'. [word\decimal\-\_] + any number of combinations
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
//Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
// Pages
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
// Posts
Route::resource('posts', 'PostController');

// Authentication
Auth::routes();
//Route::get('logout', 'Auth\LoginController@logout'); // Bug, added this line to fix. Solved. Needed to change logout to form with POST method.

// Categories & tags
//Route::resource('categories', 'CategoryController', ['except' => ['create']]); //'except' is used to except route called create, must be in another array.
Route::resource('categories', 'CategoryController')->except('create');
//Route::resource('tags', 'TagController', ['except' => ['create']]);
Route::resource('tags', 'TagController')->except('create');

// Comments
//Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
//Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
//Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
//Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
//Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
Route::get('comments/{id}/delete', 'CommentsController@delete')->name('comments.delete');