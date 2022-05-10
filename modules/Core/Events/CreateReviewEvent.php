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

class CreateReviewEvent
{
    use SerializesModels;
    public $services;
    public $review;

    public function __construct($services, $review)
    {
        $this->services = $services;
        $this->review = $review;
    }
}
