<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Language\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translation extends BaseModel
{
    use SoftDeletes;
    protected $table = 'core_translations';
    protected $fillable = [
        'locale',
        'string',
        'parent_id'
    ];
}