<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/follow/{user}','FollowsController@store');
/* admin */
Route::auth();
Route::get('/admin', function () {
    return view('admin.index');
});
Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'AdminUsersController');
});
/* end admin */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/posts', 'PostsController');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::resource('admin/users', 'AdminUsersController');
Route::resource('/home', 'Accueil');


Route::post('/follow/{user}','FollowsController@store');
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
