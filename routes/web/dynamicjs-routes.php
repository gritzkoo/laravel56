<?php
Route::name('dynamicjs.')->prefix('dynamicjs')->group(function()
{
    Route::get('base.js','DynamicjsController@base')->name('base.js');
});