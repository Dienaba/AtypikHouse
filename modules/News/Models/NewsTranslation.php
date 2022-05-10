<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\News\Models;

use App\BaseModel;

class NewsTranslation extends BaseModel
{
    protected $table = 'core_news_translations';
    protected $fillable = ['title', 'content'];
    protected $seo_type = 'news_translation';
    protected $cleanFields = [
        'content'
    ];
}