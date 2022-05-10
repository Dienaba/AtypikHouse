<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Booking\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslation extends Service
{
    use SoftDeletes;
    protected $table = 'bravo_service_translations';
    protected $fillable  = [
        'title',
        'address',
        'content',
        'locale',
    ];
    protected $slugField = false;
}