<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\User\Listeners;

use App\Notifications\PrivateChannelServices;
use Modules\User\Events\AdminUpdateVerificationData;
use Modules\User\Events\UserVerificationSubmit;

class SendNotifyUpdateVerificationData
{

    /**
     * Handle the event.
     *
     * @param $event UserVerificationSubmit
     * @return void
     */
    public function handle(AdminUpdateVerificationData $event)
    {
        $user = $event->user;
        $data = [
            'id' =>  $user->id,
            'event'=>'AdminUpdateVerificationData',
            'to'=>'customer',
            'name' =>  $user->display_name,
            'avatar' =>  $user->avatar_url,
            'link' => route('user.verification.index'),
            'type' => 'user_verification_request',
            'message' => __('Your account information was verified by Admin AtypikHouse')
        ];

        $user->notify(new PrivateChannelServices($data));

    }

}
