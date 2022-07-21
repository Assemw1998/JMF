<?php

use Illuminate\Support\Facades\Route;

//Super Admin side
Route::group(['namespace' => 'App\Http\Controllers\super_admin','as'=>'super-admin.','prefix'=>'super-admin'], function()
{ 
    Route::get('side', 'SuperAdminLoginController@index')->name('side');
    Route::post('login', 'SuperAdminLoginController@login')->name('login');
    Route::get('logout', 'SuperAdminLogoutController@logout')->name('logout');

    Route::group(['middleware' => ['auth:super_admin'],'as'=>'dashboard.','prefix'=>'dashboard'], function() {
        Route::get('index', 'SuperAdminDashboardController@index')->name('index');
    });

});

//Admin side
Route::group(['namespace' => 'App\Http\Controllers\admin','as'=>'admin.','prefix'=>'admin'], function()
{ 
    Route::get('side', 'AdminLoginController@index')->name('side');
    Route::post('login', 'AdminLoginController@login')->name('login');
    Route::get('logout', 'AdminLogoutController@logout')->name('logout');

    Route::group(['middleware' => ['auth:admin'],'as'=>'dashboard.','prefix'=>'dashboard'], function() {
        Route::get('index', 'AdminDashboardController@index')->name('index');
    });

});

