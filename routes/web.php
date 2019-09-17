<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::delete('brands/destroy', 'BrandsController@massDestroy')->name('brands.massDestroy');
    Route::resource('brands', 'BrandsController');
    
    Route::group(['prefix' => 'brands'], function () {
        Route::post('create', 'BrandsController@postCreate')->name('admin.brands.create');
        Route::post('edit', 'BrandsController@edit')->name('admin.brands.edit');
        // Route::post('destroy', 'BrandsController@destroy')->name('admin.brands.destroy');
    });
});
