<?php

Route::get('/home', function () {
    return view('homepage');
});

Route::get("/search", "SearchController@index");

?>
