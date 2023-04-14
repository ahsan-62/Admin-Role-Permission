<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Forntend\FrontendController;
use App\Http\Controllers\Backend\PermissionController;

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

Route::get('/page/{page_slug}', [FrontendController::class, 'index']);

Auth::routes();

/*Socialite Login Routes*/
Route::group(['as' => 'login.', 'prefix'=>'login'], function(){
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('provider.callback');
});


Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/module',ModuleController::class);
    Route::resource('/permission',PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/page', PageController::class);
    Route::resource('/backup',BackupController::class);
    Route::get('/backup/download/{file_name}', [BackupController::class, 'download'])->name('backup.download');

    //is_active Route Ajax
    Route::get('check/user/is_active/{user_id}',[UserController::class,'checkActive'])->name('user.is_active.ajax');
    Route::get('check/page/is_active/{page_id}', [PageController::class, 'checkActive'])->name('page.is_active.ajax');

    Route::resource('/user',UserController::class);


    Route::get('update-profile',[ProfileController::class,'getUpdateProfile'])->name('getupdate.profile');
    Route::post('update-profile',[ProfileController::class,'updateProfile'])->name('postupdate.profile');

    Route::get('update-password', [ProfileController::class, 'getUpdatePassword'])->name('getupdate.password');
    Route::post('update-password', [ProfileController::class, 'updatePassword'])->name('postupdate.password');



    Route::group(['as'=>'settings.','prefix'=>'settings'],function(){

        Route::get('general',[SettingController::class,'general'])->name('general');
        Route::post('general',[SettingController::class,'generalUpdate'])->name('general.update');

    });

});
