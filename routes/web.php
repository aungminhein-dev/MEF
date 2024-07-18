<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('blogs','blogs')->name('blogs');
    Route::get('courses','courses')->name('courses');
    Route::get('about','about')->name('about');

});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::prefix('admin')->controller(AdminController::class)->group(function(){
        Route::get('dashboard','dashboard')->name('admin.dashboard');
        Route::get('profile/{id}','profile')->name('admin.profile');
    });
    Route::get('settings/{id}',[SettingController::class,'index'])->name('settings');
});

