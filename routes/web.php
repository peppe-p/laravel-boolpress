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

Route::get('/', 'PageController@index')->name('index');
Route::get('chisiamo', 'PageController@chisiamo')->name('chisiamo');
Route::get('contattaci', 'PageController@contattaci')->name('contattaci');

/* Route per invio form */
Route::post('contacts', 'PageController@sendForm')->name('contacts.send');

/* Route per vue */
Route::get('vue-posts', function () {
    return view('vue-posts');
});

Auth::routes();
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
});