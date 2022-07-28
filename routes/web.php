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
        //main
        Route::get('index', 'dashboard\MainController@index')->name('index');

        //motorcycles
        Route::get('motorcycles-index', 'dashboard\MotorcyclesController@index')->name('motorcycles-index');
        Route::get('motorcycles-create-view', 'dashboard\MotorcyclesController@viewCreate')->name('motorcycles-create-view');
        Route::post('motorcycles-create', 'dashboard\MotorcyclesController@create')->name('motorcycles-create');
        Route::get('motorcycles-view/{id}', 'dashboard\MotorcyclesController@view')->name('motorcycles-view');
        Route::get('motorcycles-update-view/{id}', 'dashboard\MotorcyclesController@viewUpdate')->name('motorcycles-update-view');
        Route::post('motorcycles-delete-image', 'dashboard\MotorcyclesController@deleteImage')->name('motorcycles-delete-image');
        Route::post('motorcycles-update/{id}', 'dashboard\MotorcyclesController@update')->name('motorcycles-update');
        Route::post('motorcycles-delete', 'dashboard\MotorcyclesController@delete')->name('motorcycles-delete');
        
        //model
        Route::get('model-index', 'dashboard\ModelController@index')->name('model-index');
        Route::get('model-create-view', 'dashboard\ModelController@viewCreate')->name('model-create-view');
        Route::post('model-create', 'dashboard\ModelController@create')->name('model-create');
        Route::get('model-view/{id}', 'dashboard\ModelController@view')->name('model-view');
        Route::get('model-update-view/{id}', 'dashboard\ModelController@viewUpdate')->name('model-update-view');
        Route::post('model-update/{id}', 'dashboard\ModelController@update')->name('model-update');
        Route::post('model-delete', 'dashboard\ModelController@delete')->name('model-delete');
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

