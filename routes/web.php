<?php

Route::get('/home', 'HomePageController@home')->name('home');



Route::get("/search", "SearchController@index")->name('get_search');

Route::get('/homepage', 'TouristRegisterController@home');

Route::get('/register', 'TouristRegisterController@register');

Route::get("/register", "TouristRegisterController@register")->name("get_register");
Route::post("/register", "TouristRegisterController@add")->name("post_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/translator_login', 'TranslatorController@register')->name('get_login');
Route::post('/translator_login', 'TranslatorController@register')->name('post_login');


Auth::routes();

