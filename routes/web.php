<?php

Route::get('/home', 'HomePageController@home')->name('homepage');

Route::get('/homepage', 'VistorRegisterController@home');

Route::get("/search", "SearchController@index");
Route::get("/vistor_register", "VistorRegisterController@register")->name("get_vistor_register");
Route::post("/vistor_register", "VistorRegisterController@register")->name("post_vistor_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/translator_login', 'TranslatorController@login')->name('get_login');
Route::post('/translator_login', 'TranslatorController@login')->name('post_login');
Route::get('/logout', 'TranslatorController@logout')->name('logout');
Route::get('/choose_time', 'ChooseController@time')->name('choose');

Auth::routes();
