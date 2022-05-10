<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Page\Models;

use App\BaseModel;

class PageTranslation extends BaseModel
{
    protected $table = 'core_page_translations';
    protected $fillable = ['title', 'content'];
    protected $seo_type = 'page_translation';
    protected $cleanFields = [
        'content'
    ];
}