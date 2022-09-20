<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ReaderController;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\UserController;
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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard',[HomeController::class,'index' ] )->name('dashboard');
});
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {

    Route::resource('readers', ReaderController::class);
    Route::resource('stories', StoryController::class);
    Route::resource('users', UserController::class);

});
require __DIR__.'/auth.php';
