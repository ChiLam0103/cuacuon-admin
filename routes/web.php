<?php

// Route::redirect('/', '/login');

// Route::redirect('/home', '/admin');
Route::get('/', 'HomeController@index');
Route::get('san-pham', 'HomeController@products');
Route::get('bao-gia', 'HomeController@priceProducts');
Route::post('bao-gia', 'HomeController@postPriceProducts');
Route::get('tin-tuc', 'HomeController@news');
Route::get('gioi-thieu', 'HomeController@about');
Route::get('lien-he', 'HomeController@contact');
Route::post('lien-he', 'HomeController@postContact');
Route::get('bao-hanh', 'HomeController@warranty');
Route::get('chi-tiet-san-pham/{id?}', 'HomeController@productDetail');
Route::get('noi-dung-tin-tuc/{id?}', 'HomeController@newsDetail');
Route::post('ajax/getProduct', 'HomeController@getProduct');
Route::get('export', 'HomeController@export')->name('export');

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
        Route::get('create', 'ProductsController@getCreate');
        Route::post('create', 'ProductsController@postCreate');
        Route::get('edit/{id?}', 'ProductsController@getEdit');
        Route::post('edit', 'ProductsController@postEdit');
    });
    //ranges
    Route::resource('ranges', 'RangesController');
    Route::group(['prefix' => 'ranges'], function () {
        Route::get('/', 'RangesController@index')->name('admin.ranges.index');
        Route::post('create', 'RangesController@postCreate')->name('admin.ranges.create');
        Route::get('edit', 'RangesController@edit')->name('admin.ranges.edit');
    });
    //warranty_types
    Route::resource('warranty_types', 'WarrantyTypesController');
    Route::group(['prefix' => 'warranty_types'], function () {
        Route::get('/', 'WarrantyTypesController@index')->name('admin.warranty_types.index');
        Route::post('create', 'WarrantyTypesController@postCreate')->name('admin.warranty_types.create');
        Route::get('edit', 'WarrantyTypesController@edit')->name('admin.warranty_types.edit');
    });
    //seo_tags
    Route::resource('seo_tags', 'SeoTagsController');
    Route::group(['prefix' => 'seo_tags'], function () {
        Route::get('/', 'SeoTagsController@index')->name('admin.seo_tags.index');
        Route::post('create', 'SeoTagsController@postCreate')->name('admin.seo_tags.create');
        Route::get('edit', 'SeoTagsController@edit')->name('admin.seo_tags.edit');
    });
    //home_banners
    Route::resource('home_banners', 'HomeBannersController');
    Route::group(['prefix' => 'home_banners'], function () {
        Route::get('/', 'HomeBannersController@index')->name('admin.home_banners.index');
        Route::post('create', 'HomeBannersController@postCreate')->name('admin.home_banners.create');
        Route::post('edit', 'HomeBannersController@postEdit');
        Route::post('ajax/getedit', 'HomeBannersController@ajaxGetEdit');
    });
    //new_types
    Route::resource('new_types', 'NewTypesController');
    Route::group(['prefix' => 'new_types'], function () {
        Route::get('/', 'NewTypesController@index')->name('admin.new_types.index');
        Route::post('create', 'NewTypesController@postCreate')->name('admin.new_types.create');
        Route::get('edit', 'NewTypesController@edit')->name('admin.new_types.edit');
    });
    //news
    Route::resource('news', 'NewsController');
    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')->name('admin.news.index');
        Route::post('create', 'NewsController@postCreate')->name('admin.news.create');
        Route::get('edit/{id?}', 'NewsController@edit');
        Route::post('edit', 'NewsController@postEdit');
        Route::post('ajax/getedit', 'NewsController@ajaxGetEdit');
    });
    Route::resource('quotations', 'QuotationsController');
    Route::group(['prefix' => 'quotations'], function () {
        Route::get('/', 'QuotationsController@index')->name('admin.quotations.index');
        Route::get('detail/{id?}', 'QuotationsController@detail')->name('admin.quotations.detail');
    });
});