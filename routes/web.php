<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\admin','as'=>'admin.','prefix'=>'admin'], function()
{ 
    Route::get('side', 'AdminLoginController@index')->name('side');
    Route::post('login', 'AdminLoginController@login')->name('login');

    Route::group(['middleware' => ['auth:admin'],'as'=>'dashboard.','prefix'=>'dashboard'], function() {
        Route::get('index', 'AdminDashboardController@index')->name('index');
    
    });
});