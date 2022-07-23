<?php

use Illuminate\Support\Facades\Route;

///super-admin.dashboard.index



//Super Admin side
Route::group(['namespace' => 'App\Http\Controllers\super_admin','as'=>'super-admin.','prefix'=>'super-admin'], function()
{ 
    Route::get('side', 'auth\LoginController@index')->name('side');
    Route::post('login', 'auth\LoginController@login')->name('login');
    Route::get('logout', 'auth\LogoutController@logout')->name('logout');

    Route::group(['middleware' => ['auth:super_admin'],'as'=>'dashboard.','prefix'=>'dashboard'], function() {
        Route::get('index', 'dashboard\MainController@index')->name('index');
        Route::get('motorcycles-index', 'dashboard\MotorcyclesController@index')->name('motorcycles-index');
        
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

