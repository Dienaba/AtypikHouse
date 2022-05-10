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

class  UserSubscriberSubmit
{
    use SerializesModels;
    public $subscriber;

    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }
}
