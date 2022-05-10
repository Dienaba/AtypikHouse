<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Vendor\Events;

use Illuminate\Queue\SerializesModels;

class  PayoutRequestEvent
{
    use SerializesModels;
    public $user;
    public $payout_request;
    public $action;

    public function __construct($action,$payout_request)
    {
        $this->action = $action;
        $this->payout_request = $payout_request;
        $this->user = $payout_request->vendor;
    }
}