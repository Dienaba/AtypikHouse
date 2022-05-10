<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\Booking\Models;


use App\BaseModel;

class PaymentMeta extends BaseModel
{
    protected $table = 'bravo_booking_payment_meta';
    protected $fillable = [
        'name' ,
        'val'  ,
        'payment_id',
    ];
}
