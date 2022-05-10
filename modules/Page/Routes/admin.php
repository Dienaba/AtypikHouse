<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
use Illuminate\Support\Facades\Route;

Route::get('/','PageController@index')->name('page.admin.index');

Route::match(['get'],'/create','PageController@create')->name('page.admin.create');
Route::match(['get'],'/edit/{id}','PageController@edit')->name('page.admin.edit');
Route::match(['get'],'/builder/{id}','BuilderController@edit')->name('page.admin.builder');

Route::post('/store/{id}','PageController@store')->name('page.admin.store');

Route::get('/getForSelect2','PageController@getForSelect2')->name('page.admin.getForSelect2');
Route::post('/bulkEdit','PageController@bulkEdit')->name('page.admin.bulkEdit');
