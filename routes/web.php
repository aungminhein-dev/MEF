<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SettingController;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('blogs','blogs')->name('blogs');
    Route::get('courses','courses')->name('courses');
    Route::get('about','about')->name('about');

});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::prefix('admin')->controller(AdminController::class)->group(function(){
        Route::get('dashboard','dashboard')->name('admin.dashboard');
    });
    Route::get('settings/{id}',[SettingController::class,'index'])->name('settings');
    Route::post('profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::prefix('users')->controller(UserController::class)->group(function(){
        Route::get('list','list')->name('admin.users.list');
    });

});

