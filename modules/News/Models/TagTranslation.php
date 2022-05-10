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

class TagTranslation extends BaseModel
{
    protected $table = 'core_tag_translations';
    protected $fillable = ['name', 'content','image_id'];
    protected $seo_type = 'tag_translation';
    protected $cleanFields = [
        'content'
    ];
}