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

class Notification extends BaseModel
{
    protected $table  = 'core_notifications';

    protected $fillable = [
        'from_user',
        'to_user',
        'type',
        'type_group',
        'is_read',
        'target_id',
        'params',
        'target_parent_id'
    ];

}