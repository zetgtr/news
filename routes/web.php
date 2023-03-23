<?php

use Illuminate\Support\Facades\Route;
use News\Http\Controllers\CategoryController;
use News\Http\Controllers\NewsController;
use News\Http\Controllers\SettingsController;


Route::middleware('auth')->group(function () {
    Route::group(['prefix'=>"admin", 'as'=>'admin.', 'middleware' => 'is_admin'],static function(){
        Route::resource('news', NewsController::class);
        Route::group(['prefix' => 'news', 'as' => 'news.'], static function(){
            Route::resource('category', CategoryController::class);
        });
        Route::group(['prefix' => 'news', 'as' => 'news.'], static function(){
            Route::resource('settings', SettingsController::class);
        });
    });
});
