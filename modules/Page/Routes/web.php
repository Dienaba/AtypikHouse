<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
use Illuminate\Support\Facades\Route;

// Page
Route::group(['prefix'=>config('page.page_route_prefix')],function(){
    Route::get('/{slug?}','PageController@detail')->name('page.detail');// Detail
});
