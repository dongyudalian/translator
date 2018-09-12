<?php

Route::get('/home', 'HomePageController@home')->name('home');

Route::get('/homepage', 'VistorRegisterController@home');

Route::get("/vistor_register", "VistorRegisterController@register")->name("get_vistor_register");
Route::post("/vistor_register", "VistorRegisterController@register")->name("post_vistor_register");

Route::get('/translator_register', 'TranslatorController@register')->name('get_register');
Route::post('/translator_register', 'TranslatorController@register')->name('post_register');

Route::get('/translator_login', 'TranslatorController@register')->name('get_login');
Route::post('/translator_login', 'TranslatorController@register')->name('post_login');

Auth::routes();
