<?php

Route::get('/homepage', 'HomePageController@home')->name('homepage');

<<<<<<< HEAD
Route::get("/search", "SearchController@index")->name('get_search');

Route::get('/homepage', 'TouristRegisterController@home');
=======
Route::get("/search", "SearchController@index");
>>>>>>> be469e8324a1fbbbaf71ce57e4502a93d98b2258

Route::get("/visitor_register", "VisitorRegisterController@register")->name("get_visitor_register");
Route::post("/visitor_register", "VisitorRegisterController@register")->name("post_visitor_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/visitor_login', 'VisitorLoginController@login')->name('get_visitor_login');
Route::post('/visitor_login', 'VisitorLoginController@login')->name('post_visitor_login');
Route::get('/visitors_logout', 'VisitorLoginController@logout')->name('logout');

Route::get('/translator_login', 'TranslatorController@login')->name('get_login');
Route::post('/translator_login', 'TranslatorController@login')->name('post_login');
Route::get('/logout', 'TranslatorController@logout')->name('logout');
Route::get('/choose_time', 'ChooseController@time')->name('choose');

Auth::routes();
