<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'HomeController@index')->name('home');

Route::resource('posts','PostController')->only(['index','show']);

Auth::routes();
Route::prefix('admin')->middleware('auth')->name('admin.')->namespace('Admin')->group(function (){
    Route::resource('posts','PostController')->except('show');
    Route::resource('pictures','PictureController');
});

