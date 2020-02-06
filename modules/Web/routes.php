<?php

Route::group(['middleware' => 'web'], function () {
    // Mod: Web
    Route::group(['module' => 'Web', 'namespace' => 'Modules\Web\Controllers'], function () {
        Route::get('/', 'HomeController@getHome')->name('home');
    });
});