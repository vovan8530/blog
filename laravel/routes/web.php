<?php

use App\Facades\GetApiData;
use App\Jobs\TestJob;
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
//Route::get('/', function (){
//    return GetApiData::getData(); test custom facade
//})->name('home');
Route::resource('posts','PostController')->only(['index','show']);
Auth::routes();

Route::prefix('admin')->middleware('role:admin','auth' )->name('admin.')->namespace('Admin')->group(function (){
    Route::resource('posts','PostController');
    Route::resource('pictures','PictureController');
});




Route::get('job1', function(){
    TestJob::dispatch('JOB1')
        ->delay(now()->addMinutes(1));
    return '';
});
Route::get('job2', function(){
    TestJob::dispatch('JOB2');
    return '';
});
