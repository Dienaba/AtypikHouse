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

class  VendorApproved
{
    use SerializesModels;
    public $user;
    public $upgrade_request;

    public function __construct($user,$upgrade_request)
    {
        $this->user = $user;
        $this->upgrade_request = $upgrade_request;
    }
}