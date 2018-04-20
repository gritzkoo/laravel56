<?php

Route::name('site.')->group(function()
{
    Route::get('/','SiteController@home')->name('home');
});