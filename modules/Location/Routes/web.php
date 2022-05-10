<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
use Illuminate\Support\Facades\Route;

// Location on the AtypikHouse
Route::group(['prefix'=>config('location.location_route_prefix')],function(){
    Route::get('/{slug}','LocationController@detail')->name("location.detail");;// Detail
    Route::get('/search/searchForSelect2','LocationController@searchForSelect2')->name("location.searchForSelect");;// Search for select 2
});
