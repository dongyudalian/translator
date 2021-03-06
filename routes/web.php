<?php

Route::get('/homepage', 'HomePageController@home')->name('visitor_homepage');
Route::get('/demo/{ikus_id}', 'HomePageController@demo')->name('demo');


Route::get("/search", "SearchController@index")->name('get_search')->middleware("auth:visitor");
Route::get("/translator_info/{id}", "TranslatorInfosController@index")->name('get_translator_info');

Route::get("/visitor_register", "VisitorRegisterController@register")->name("get_visitor_register");
Route::post("/visitor_register", "VisitorRegisterController@register")->name("post_visitor_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/visitor_login', 'VisitorLoginController@login')->name('get_visitor_login');
Route::post('/visitor_login', 'VisitorLoginController@login')->name('post_visitor_login');
Route::get('/visitor_logout', 'VisitorLoginController@logout')->name('logout');

Route::get('/translator_login', 'TranslatorController@login')->name('get_login');
Route::post('/translator_login', 'TranslatorController@login')->name('post_login');
Route::get('/logout', 'TranslatorController@logout')->name('logout');
Route::get('/choose_time/{id}', 'ChooseController@time')->name('choose');
Route::post('/choose_time/{id}', 'ChooseController@time')->name('post_choose');

Route::get('/reservation','ReservationsController@index')->name('get_reservation');

Route::get('/reservation/{id}/{status_id}','ReservationsController@edit')->name('get_edit_reservation');


Auth::routes();
