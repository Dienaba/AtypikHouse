<?php
use Illuminate\Support\Facades\Route;
//Contact Route
Route::get('/contact','ContactController@index')->name("contact.index");
Route::post('/contact/store','ContactController@store')->name("contact.store");
