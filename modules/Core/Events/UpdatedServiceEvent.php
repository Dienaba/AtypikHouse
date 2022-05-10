<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core\Events;


use Illuminate\Queue\SerializesModels;

class UpdatedServiceEvent
{
    use SerializesModels;
    public $services;

    public function __construct($services)
    {
        $this->services = $services;
    }
}
