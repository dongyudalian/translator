<?php

Route::get('/home', function () {
    return view('homepage');
});

// 用户登陆
Route::get('/homepage', 'TouristRegisterController@home');

Route::get('/register', 'TouristRegisterController@register');

Route::get("/register", "TouristRegisterController@register")->name("get_register");
Route::post("/register", "TouristRegisterController@add")->name("post_register");
