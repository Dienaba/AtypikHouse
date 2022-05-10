<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'language'],function (){
    Route::get('/set-lang/{locale}', 'LanguageController@setLang')->name('language.set-lang');
    Route::get('/set-admin-lang/{locale}', 'LanguageController@setAdminLang')->name('language.set-admin-lang');
});
