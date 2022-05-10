<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
    use Illuminate\Support\Facades\Route;

    Route::get('/testEmail','EmailController@testEmail')->name('email.admin.testEmail');
