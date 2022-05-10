<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Space\Models;

use App\BaseModel;

class SpaceTerm extends BaseModel
{
    protected $table = 'bravo_space_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}