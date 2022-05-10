<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\Admin;


abstract class BaseCrudModule
{

    static $version = "1.0";

    public $model;

    public function index(){
        return  [];
    }
    public function create(){
        return  [];
    }
}
