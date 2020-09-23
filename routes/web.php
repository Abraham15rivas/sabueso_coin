<?php

Auth::routes(['verify' => true]);
// ['verify' => true]
// Routes globals

Route::get('/', 'HomeController@welcome');
Route::get('/home/company/{company}', 'HomeController@showCompany');
Route::post('/companies/search', 'HomeController@search');
Route::get('/maps', 'HomeController@map')->name('map');
Route::get('/glufco', 'HomeController@glufco')->name('glufco');
Route::get('/register/verify/{code}', 'GuestController@verify');
Route::get('/country/cities', 'CountryController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/load/ratings/{company}', 'HomeController@loadRatings')->name('search-rating');
    Route::get('/home/search/ratings/{company}', 'HomeController@searchRating');
    // Group of routes only for user with email verifid 
    Route::group(['middleware' => 'verified'], function () {
        Route::post('/home/rating', 'HomeController@rating')->name('rating');
        Route::get('/coments','HomeController@coments');
        // Profile - CRUD
        Route::resource('/profiles', 'ProfileController');
    });

    Route::group([
        'prefix' => 'admin',
        'namespace' => 'admin',
        'middleware' => 'root'
    ], function () {
        // Categories - CRUD
        Route::get('/get-categories', 'CategoryController@getCategories');
        Route::resource('/categories', 'CategoryController');

        //  Payments - CRUD
        Route::get('/get-payments','PaymentController@getPayments');
        Route::resource('/payments', 'PaymentController');

        // Companys - CRUD
        Route::get('/get-companies', 'CompanyController@getCompanies');
        Route::resource('/companies', 'CompanyController');
    });
});
