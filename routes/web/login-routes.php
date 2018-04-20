<?php
Route::name('login.')->group(function(){
    Route::get('/login','PainelController@loginblade')->name('index');
    Route::post('/login','PainelController@login')->name('login');
    Route::get('/logout','PainelController@logout')->name('logout');
});