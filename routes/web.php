<?php

use Illuminate\Support\Facades\Route;
use News\Http\Controllers\CategoryController;
use News\Http\Controllers\NewsController;
use News\Http\Controllers\SettingsController;
use News\Models\Settings;



Route::middleware('web')->group(function (){
    Route::middleware('auth_pacage')->group(function () {
        Route::group(['prefix'=>"admin", 'as'=>'admin.', 'middleware' => 'is_admin'],static function(){
            Route::resource('news', NewsController::class);
            Route::group(['prefix' => 'news', 'as' => 'news.'], static function(){
                Route::resource('category', CategoryController::class);
            });
            Route::group(['prefix' => 'news', 'as' => 'news.'], static function(){
                Route::resource('settings', SettingsController::class);
            });
        });
        $settings = Settings::find(1);
        Route::get('/'.$settings->url,[NewsController::class,'frontIndex'])->name('news');
        Route::get('/'.$settings->url . '/{url}',[NewsController::class,'news'])->name('news.news');
    });
});
