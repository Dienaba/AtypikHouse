<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
    namespace App\Http\Middleware;

    use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

    class PreventRequestsDuringMaintenance extends Middleware
    {
        /**
         * The URIs that should be reachable while maintenance mode is enabled. This mode dont work in our Project F2I
         *
         * @var array
         */
        protected $except = [
            //
        ];
    }