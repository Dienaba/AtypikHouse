<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;

class  UpdateCreditPurchase
{
    use SerializesModels;
    public $user;
    public $payment;

    public function __construct($user,$payment)
    {
        $this->user = $user;
        $this->payment = $payment;
    }
}
