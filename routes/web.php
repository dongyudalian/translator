<?php

Route::get('/home', 'HomePageController@home')->name('home');

Route::get('/homepage', 'VisitorRegisterController@home');

Route::get("/search", "SearchController@index");

Route::get("/visitor_register", "VisitorRegisterController@register")->name("get_visitor_register");
Route::post("/visitor_register", "VisitorRegisterController@register")->name("post_visitor_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/visitor_login', 'VisitorLoginController@login')->name('get_visitor_login');
Route::post('/visitor_login', 'VisitorLoginController@login')->name('post_visitor_login');

Route::get('/translator_login', 'TranslatorController@login')->name('get_login');
Route::post('/translator_login', 'TranslatorController@login')->name('post_login');

Auth::routes();
