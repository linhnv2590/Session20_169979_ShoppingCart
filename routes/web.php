<?php

Route::get('/', 'ProductController@home')->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/create', 'ProductController@store')->name('products.store');
    Route::get('/{id}', 'ProductController@show')->name('products.show');
    Route::get('/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::post('/{id}/edit', 'ProductController@update')->name('products.update');
    Route::get('/{id}/delete', 'ProductController@delete')->name('products.delete');
    Route::post('/{id}/delete', 'ProductController@destroy')->name('products.destroy');
    Route::get('search/search', 'ProductController@search')->name('products.search');
});


