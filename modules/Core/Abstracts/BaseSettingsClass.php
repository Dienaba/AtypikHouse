<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core\Abstracts;

use Illuminate\Http\Request;

abstract class BaseSettingsClass{
    abstract public static function getSettingPages();

    public static function filterValuesBeforeSaving($setting_values,Request $request)
    {
        return $setting_values;
    }
}