<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

    namespace Modules\Core\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Core\Events\CreateReviewEvent;

    class CreateReviewListen
    {
        public function handle(CreateReviewEvent $event)
        {
            $services = $event->services;
            $review = $event->review;

            $data = [
                'id'      => $services->id,
                'event'   => 'CreateReviewEvent',
                'to'      => 'admin',
                'name'    => Auth::user()->display_name,
                'avatar'  => Auth::user()->avatar_url,
                'link'    => route('review.admin.index'),
                'type'    => $services->type,
                'message' => __(':name has created a Review :review on :title', ['name' => Auth::user()->display_name, 'review' => $review->title, 'title' => $services->title])
            ];
            // notify for admin AtypikHouse
            Auth::user()->notify(new AdminChannelServices($data));

            // notify for vendor AtypikHouse
            $vendor = User::where('id', $services->create_user)->where('status', 'publish')->first();
            if ($vendor and !$vendor->hasAnyPermission(['dashboard_access'])) {
                $data['to'] = 'vendor';
                $vendor->notify(new PrivateChannelServices($data));

            }


        }
    }
