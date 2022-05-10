<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Template\Models;

use App\BaseModel;

class TemplateTranslation extends Template
{
    protected $table = 'core_template_translations';
    protected $fillable = ['title', 'content'];
}