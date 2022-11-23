<?php

use App\Http\Controllers\admin\AdminSampleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Models\Source;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\admin\SampleController;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\SourceController;
use App\Http\Controllers\admin\SourceAdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

// Route::post('/save/video', function (Request $request) {
//     return $request;
//     // return Storage::put('video/1', $request->video);

// });

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/cache', function () {
    Artisan::call('optimize:clear');

})->name('cache');

Route::get('/get-sources', function () {
    return Source::all();
});
Route::get('/storage', function () {
    Artisan::call('storage:link');
});
// Route::get('/get-sources',[SourceAdminController::class,'getSources' ] );
Route::middleware('auth')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::group(['middleware' => ['auth', 'role:admin']], function () {
});
Route::group(['prefix' => 'admin'], function () {
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
        Route::get('/edit/{id}', 'edit')->name('edit');
        // Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroyAdmin')->name('destroy');
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
    Route::prefix('users')->name('admin.users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/role/{role}', 'role')->name('role');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    // Routes for Admin to check Story and Reader Samples

    Route::prefix('samples')->name('admin.samples.')->controller(AdminSampleController::class)->group(function () {
        Route::get('/index',[AdminSampleController::class,'index'])->name('index');
    });

    // Route::resource('users', UserController::class)->names([
    //     'index'=>'users.index',
    //     'edit'=>'admin.users.edit',
    //     'update'=>'admin.users.update',
    //     'destroy'=>'admin.users.destroy',
    // ])->parameters([
    //     'destroy' => 'id'
    // ]);
});

// Routes for SourceAdmin
Route::prefix('sadmin')->middleware(['auth', 'role:sadmin'])->name('sadmin.')->group(function () {
    Route::get('/', [SourceAdminController::class, 'userDashboard'])->name('dashboard');
    Route::get('/dashboard', [SourceAdminController::class, 'userDashboard'])->name('home');
    Route::get('/mysource', [SourceAdminController::class, 'mySource'])->name('mysource');

    // Source Manager
    Route::get('/manager', [ManagerController::class, 'show'])->name('manager');
    Route::get('/managers', [ManagerController::class, 'show'])->name('managers');
    Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.new');
    Route::get('/manager/edit/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::post('/manager/update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('/manager/delete/{id}', [ManagerController::class, 'destroy'])->name('manager.delete');

    // Stories for Source Admin
    Route::get('/stories', [StoryController::class, 'sadminStories'])->name('stories');

    // Stories Samples for Source Admin
    Route::get('/samples', [SourceAdminController::class, 'samples'])->name('samples');

    Route::post('/mysource/update/{id}', [SourceController::class, 'updateSource'])->name('mysource.update');
    Route::get('/reader/edit/{id}', [SourceController::class, 'editReader'])->name('reader.edit');
    Route::post('/reader/update/{id}', [SourceController::class, 'updateReader'])->name('reader.update');
    Route::get('/readers', [SourceController::class, 'readers'])->name('readers');
    Route::get('/reader/create', [SourceController::class, 'createNewReader'])->name('reader.new');
    Route::post('/reader/store', [SourceController::class, 'createReader'])->name('reader.create');
    Route::get('/reader/destroy/{id}', [SourceController::class, 'destroyReader'])->name('reader.destroy');
});

// Routes for Public/Reader's Manager created by Sub Admin
Route::prefix('user')->middleware(['auth', 'role:manager'])->name('user.')->group(function () {
    Route::get('/dashboard', [PublicController::class, 'index'])->name('home');

    Route::post('/grade', [PublicController::class, 'gradeStory'])->name('grade.stories');
    Route::get('/stories', [PublicController::class, 'stories'])->name('stories');
    Route::get('/story/{id}', [PublicController::class, 'story'])->name('story');
    Route::post('/stories/questions', [PublicController::class, 'questions'])->name('story.questions');
    Route::get('/stories/assignments', [PublicController::class, 'assignments'])->name('stories.assignments');
    Route::get('/stories/assign', [PublicController::class, 'assignStories'])->name('stories.assign');
    Route::post('/stories/assigned', [PublicController::class, 'storiesAssigned'])->name('stories.assigned');


    // View Sample of Reader
    Route::get('/sample/{id}', [PublicController::class, 'viewSample'])->name('sample');
    // Route::post('/reader/upadte/{id}', [PublicController::class,'update'])->name('reader.update');

    Route::get('/reader/edit/{id}', [PublicController::class, 'edit'])->name('reader.edit');
    Route::post('/reader/upadte/{id}', [PublicController::class, 'update'])->name('reader.update');

    Route::get('/reader/create', [PublicController::class, 'createReader'])->name('reader.create');
    Route::post('/reader/create', [PublicController::class, 'storeReader'])->name('reader.store');
    Route::get('/readers', [PublicController::class, 'readers'])->name('readers');

    Route::get('/reader/delete/{id}', [PublicController::class, 'destroy'])->name('reader.destroy');
});

// Routes for Reader
// 'middleware' => 'prevent-back-history'
Route::group(['as'=>'reader.','prefix'=>'reader'], function (){
    // Sample Collection
    Route::get('/dashboard', [ReaderController::class, 'index'])->name('dashboard');
    Route::get('/read/story/{id}', [ReaderController::class, 'show'])->name('read.story');
    Route::get('/readers', [ReaderController::class, 'readers'])->name('readers');
    Route::post('/sample/{id}', [ReaderController::class, 'sample'])->name('sample');
    Route::get('/read/modal_story/{id}', [ReaderController::class, 'show_model_sample'])->name('read.modal_story');

});

require __DIR__ . '/auth.php';
