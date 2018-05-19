<?php
Route::middleware('auth')->name('painel.')->prefix('painel')->group(function()
{
    Route::get('/','PainelController@index')->name('index');
    Route::post('/mail', 'PainelController@mailTest')->name('mailtest');
});