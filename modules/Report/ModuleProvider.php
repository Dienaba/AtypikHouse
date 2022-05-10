<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\Report;

use Modules\User\Models\Wallet\DepositPayment;

class ModuleProvider extends \Modules\ModuleServiceProvider
{
    public function register()
    {

        $this->app->register(RouteServiceProvider::class);
    }
    public static function getAdminMenu()
    {
        $count = 0;
        $pending_purchase = DepositPayment::countPending();
        $count += $pending_purchase;
        return [
            'report'=>[
                "position"=>110,
                'url'        => route('report.admin.booking'),
                'title'      => __('Rapports de réservation AtypikHouse'),
                'icon'       => '',
                'permission' => 'report_view',

            ],
        ];
    }
}
