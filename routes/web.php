<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\admin\ReaderController;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\SourceController;
use App\Http\Controllers\admin\SourceAdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Http\Request;

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

Route::post('/save/video', function (Request $request) {
    return $request;
});
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('app');
// });

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard',[HomeController::class,'index' ] )->name('dashboard');
});
Route::group(['prefix' => 'admin'], function() {
    Route::resource('readers', ReaderController::class);
    // For Sources, LIke Schools
    Route::prefix('sources')->name('admin.sources.')->controller(SourceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    // For Source Administrators, Like Principles
    Route::prefix('admin-source')->name('admin.source.')->controller(SourceAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    // For Source Managers, Created by Source Administrators
    Route::prefix('manager')->name('admin.manager.')->controller(ManagerController::class)->group(function () {
        Route::get('/', 'adminManager')->name('index');
        // Route::get('/create', 'create')->name('create');
        // Route::post('/store', 'store')->name('store');
        // Route::get('/edit/{id}', 'edit')->name('edit');
        // Route::post('/update/{id}', 'update')->name('update');
        // Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('stories')->name('admin.stories.')->controller(StoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    // Route::resource('stories', StoryController::class);
    Route::resource('users', UserController::class);
});

// Routes for SourceAdmin
Route::prefix('sadmin')->name('sadmin.')->group( function() {
    Route::get('/', [SourceAdminController::class,'userDashboard'])->name('dashboard');
    Route::get('/dashboard', [SourceAdminController::class,'userDashboard'])->name('home');
    Route::get('/mysource', [SourceAdminController::class,'mySource'])->name('mysource');

    // Source Manager
    Route::get('/manager', [ManagerController::class,'show'])->name('manager');
    Route::get('/managers', [ManagerController::class,'show'])->name('managers');
    Route::get('/manager/create', [ManagerController::class,'create'])->name('manager.create');
    Route::post('/manager/store', [ManagerController::class,'store'])->name('manager.new');
    Route::get('/manager/edit/{id}', [ManagerController::class,'edit'])->name('manager.edit');
    Route::post('/manager/update/{id}', [ManagerController::class,'update'])->name('manager.update');
    Route::get('/manager/delete/{id}', [ManagerController::class,'destroy'])->name('manager.delete');

    Route::post('/mysource/update/{id}', [SourceController::class,'updateSource'])->name('mysource.update');
    Route::get('/reader/edit/{id}', [SourceController::class,'editReader'])->name('reader.edit');
    Route::post('/reader/update/{id}', [SourceController::class,'updateReader'])->name('reader.update');
    Route::get('/readers', [SourceController::class,'readers'])->name('readers');
    Route::get('/reader/create', [SourceController::class,'createNewReader'])->name('reader.new');
    Route::post('/reader/store', [SourceController::class,'createReader'])->name('reader.create');
    Route::get('/reader/destroy/{id}', [SourceController::class,'destroyReader'])->name('reader.destroy');
});

// Routes for Public/Reader's Manager created by Sub Admin
Route::prefix('user')->name('user.')->group( function() {
    Route::get('/dashboard', [PublicController::class,'index'])->name('home');
    Route::get('/stories', [PublicController::class,'stories'])->name('stories');
    Route::get('/readers', [PublicController::class,'readers'])->name('readers');
    // Route::post('/mysource/update/{id}', [PublicController::class,'updateSource'])->name('mysource.update');
    // Route::get('/reader/edit/{id}', [PublicController::class,'editReader'])->name('reader.edit');
    // Route::post('/reader/update/{id}', [PublicController::class,'updateReader'])->name('reader.update');
    // Route::get('/readers', [PublicController::class,'readers'])->name('readers');
    // Route::get('/reader/create', [PublicController::class,'createNewReader'])->name('reader.new');
    // Route::post('/reader/store', [PublicController::class,'createReader'])->name('reader.create');
    // Route::get('/reader/destroy/{id}', [PublicController::class,'destroyReader'])->name('reader.destroy');
});
require __DIR__.'/auth.php';
