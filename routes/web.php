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
        Route::get('brand-index', 'dashboard\BrandController@index')->name('brand-index');
        Route::get('brand-create-view', 'dashboard\BrandController@viewCreate')->name('brand-create-view');
        Route::post('brand-create', 'dashboard\BrandController@create')->name('brand-create');
        Route::get('brand-view/{id}', 'dashboard\BrandController@view')->name('brand-view');
        Route::get('brand-update-view/{id}', 'dashboard\BrandController@viewUpdate')->name('brand-update-view');
        Route::post('brand-update/{id}', 'dashboard\BrandController@update')->name('brand-update');
        Route::post('brand-delete', 'dashboard\BrandController@delete')->name('brand-delete');

        //model
        Route::get('model-index', 'dashboard\ModelController@index')->name('model-index');
        Route::get('model-create-view', 'dashboard\ModelController@viewCreate')->name('model-create-view');
        Route::post('model-create', 'dashboard\ModelController@create')->name('model-create');
        Route::get('model-view/{id}', 'dashboard\ModelController@view')->name('model-view');
        Route::get('model-update-view/{id}', 'dashboard\ModelController@viewUpdate')->name('model-update-view');
        Route::post('model-update/{id}', 'dashboard\ModelController@update')->name('model-update');
        Route::post('model-delete', 'dashboard\ModelController@delete')->name('model-delete');

        //cylinder
        Route::get('engineType-index', 'dashboard\EngineTypeController@index')->name('engineType-index');
        Route::get('engineType-create-view', 'dashboard\EngineTypeController@viewCreate')->name('engineType-create-view');
        Route::post('engineType-create', 'dashboard\EngineTypeController@create')->name('engineType-create');
        Route::get('engineType-view/{id}', 'dashboard\EngineTypeController@view')->name('engineType-view');
        Route::get('engineType-update-view/{id}', 'dashboard\EngineTypeController@viewUpdate')->name('engineType-update-view');
        Route::post('engineType-update/{id}', 'dashboard\EngineTypeController@update')->name('engineType-update');
        Route::post('engineType-delete', 'dashboard\EngineTypeController@delete')->name('engineType-delete');

         //color
         Route::get('color-index', 'dashboard\ColorController@index')->name('color-index');
         Route::get('color-create-view', 'dashboard\ColorController@viewCreate')->name('color-create-view');
         Route::post('color-create', 'dashboard\ColorController@create')->name('color-create');
         Route::get('color-view/{id}', 'dashboard\ColorController@view')->name('color-view');
         Route::get('color-update-view/{id}', 'dashboard\ColorController@viewUpdate')->name('color-update-view');
         Route::post('color-update/{id}', 'dashboard\ColorController@update')->name('color-update');
         Route::post('color-delete', 'dashboard\ColorController@delete')->name('color-delete');

         //city
         Route::get('city-index', 'dashboard\CityController@index')->name('city-index');
         Route::get('city-create-view', 'dashboard\CityController@viewCreate')->name('city-create-view');
         Route::post('city-create', 'dashboard\CityController@create')->name('city-create');
         Route::get('city-view/{id}', 'dashboard\CityController@view')->name('city-view');
         Route::get('city-update-view/{id}', 'dashboard\CityController@viewUpdate')->name('city-update-view');
         Route::post('city-update/{id}', 'dashboard\CityController@update')->name('city-update');
         Route::post('city-delete', 'dashboard\CityController@delete')->name('city-delete');

         //customer
         Route::get('customer-index', 'dashboard\CustomerController@index')->name('customer-index');
         Route::get('customer-create-view', 'dashboard\CustomerController@viewCreate')->name('customer-create-view');
         Route::post('customer-create', 'dashboard\CustomerController@create')->name('customer-create');
         Route::get('customer-view/{id}', 'dashboard\CustomerController@view')->name('customer-view');
         Route::get('customer-update-view/{id}', 'dashboard\CustomerController@viewUpdate')->name('customer-update-view');
         Route::post('customer-update/{id}', 'dashboard\CustomerController@update')->name('customer-update');
         Route::post('customer-delete', 'dashboard\CustomerController@delete')->name('customer-delete');
         Route::post('customer-delete-image', 'dashboard\CustomerController@deleteImage')->name('customer-delete-image');
         Route::get('customer-activate-deactivate', 'dashboard\CustomerController@activateDeactivate')->name('customer-activate-deactivate');
         
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

