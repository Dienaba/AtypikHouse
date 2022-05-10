<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core\Models;

use App\BaseModel;

class MenuTranslation extends Menu
{
    protected $table = 'core_menu_translations';
    protected $fillable = ['items'];
}