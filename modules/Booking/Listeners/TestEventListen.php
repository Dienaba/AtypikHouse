<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

    namespace Modules\Booking\Listeners;


    use App\Notifications\AdminChannelServices;
    use Modules\Booking\Events\TestEvent;

    class TestEventListen
    {
        public function __construct()
        {
        }
        public function handle(TestEvent $testEvent){
            $user = $testEvent->user;
            $user->notify(new AdminChannelServices('xxx', $user));
            \Log::info('TestEvent');
        }

    }