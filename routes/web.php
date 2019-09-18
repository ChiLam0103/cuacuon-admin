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

    // brands
    Route::resource('brands', 'BrandsController');
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', 'BrandsController@index')->name('admin.brands.index');
        Route::post('create', 'BrandsController@postCreate')->name('admin.brands.create');
        Route::get('edit', 'BrandsController@edit')->name('admin.brands.edit');
    });
    //contacts
    Route::resource('contacts', 'ContactsController');
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', 'ContactsController@index')->name('admin.contacts.index');
        Route::post('create', 'ContactsController@postCreate')->name('admin.contacts.create');
        Route::get('edit', 'ContactsController@edit')->name('admin.contacts.edit');
    });
    //types
    Route::resource('types', 'TypesController');
    Route::group(['prefix' => 'types'], function () {
        Route::get('/', 'TypesController@index')->name('admin.types.index');
        Route::post('create', 'TypesController@postCreate')->name('admin.types.create');
        Route::get('edit', 'TypesController@edit')->name('admin.types.edit');
    });
    //products
    Route::resource('products', 'ProductsController');
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductsController@index')->name('admin.products.index');
        Route::post('create', 'ProductsController@postCreate')->name('admin.products.create');
        Route::get('edit', 'ProductsController@edit')->name('admin.products.edit');
    });
});
