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
        
        //make
        Route::get('make-index', 'dashboard\MakeController@index')->name('make-index');
        Route::get('make-create-view', 'dashboard\MakeController@viewCreate')->name('make-create-view');
        Route::post('make-create', 'dashboard\MakeController@create')->name('make-create');
        Route::get('make-view/{id}', 'dashboard\MakeController@view')->name('make-view');
        Route::get('make-update-view/{id}', 'dashboard\MakeController@viewUpdate')->name('make-update-view');
        Route::post('make-update/{id}', 'dashboard\MakeController@update')->name('make-update');
        Route::post('make-delete', 'dashboard\MakeController@delete')->name('make-delete');

        //model
        Route::get('model-index', 'dashboard\ModelController@index')->name('model-index');
        Route::get('model-create-view', 'dashboard\ModelController@viewCreate')->name('model-create-view');
        Route::post('model-create', 'dashboard\ModelController@create')->name('model-create');
        Route::get('model-view/{id}', 'dashboard\ModelController@view')->name('model-view');
        Route::get('model-update-view/{id}', 'dashboard\ModelController@viewUpdate')->name('model-update-view');
        Route::post('model-update/{id}', 'dashboard\ModelController@update')->name('model-update');
        Route::post('model-delete', 'dashboard\ModelController@delete')->name('model-delete');

        //cylinder
        Route::get('cylinder-index', 'dashboard\CylinderController@index')->name('cylinder-index');
        Route::get('cylinder-create-view', 'dashboard\CylinderController@viewCreate')->name('cylinder-create-view');
        Route::post('cylinder-create', 'dashboard\CylinderController@create')->name('cylinder-create');
        Route::get('cylinder-view/{id}', 'dashboard\CylinderController@view')->name('cylinder-view');
        Route::get('cylinder-update-view/{id}', 'dashboard\CylinderController@viewUpdate')->name('cylinder-update-view');
        Route::post('cylinder-update/{id}', 'dashboard\CylinderController@update')->name('cylinder-update');
        Route::post('cylinder-delete', 'dashboard\CylinderController@delete')->name('cylinder-delete');

         //color
         Route::get('color-index', 'dashboard\ColorController@index')->name('color-index');
         Route::get('color-create-view', 'dashboard\ColorController@viewCreate')->name('color-create-view');
         Route::post('color-create', 'dashboard\ColorController@create')->name('color-create');
         Route::get('color-view/{id}', 'dashboard\ColorController@view')->name('color-view');
         Route::get('color-update-view/{id}', 'dashboard\ColorController@viewUpdate')->name('color-update-view');
         Route::post('color-update/{id}', 'dashboard\ColorController@update')->name('color-update');
         Route::post('color-delete', 'dashboard\ColorController@delete')->name('color-delete');
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

