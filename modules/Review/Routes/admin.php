<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
use Illuminate\Support\Facades\Route;

Route::match(['get','post'],'/','ReviewController@index')->name('review.admin.index');
Route::post('/bulkEdit','ReviewController@bulkEdit')->name('review.admin.bulkEdit');
