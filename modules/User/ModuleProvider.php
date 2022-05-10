<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\User;
use App\Helpers\ReCaptchaEngine;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Modules\ModuleServiceProvider;
use Modules\Vendor\Models\VendorRequest;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(CustomFortifyAuthenticationProvider::class);
    }

    public static function getAdminMenu()
    {


        $options = [
            "position"=>100,
            'url'   => route('user.admin.index'),
            'title' => __('Tous les utilisateurs AtypikHouse'),
            'icon'  => '',
            'permission' => 'user_view',

        ];
        


        return [
            'users'=> $options
        ];
    }
    public static function getUserMenu()
    {
        /**
         * @var $user User
         */
        $res = [];
        $user = Auth::user();





        if(setting_item('inbox_enable')) {
            $count = auth()->user()->unseen_message_count;
            $res['chat'] = [
                'position' => 20,
                'icon' => '',
                'url' => route('user.chat'),
                'title' => __("Messages :count",['count'=>$count ? sprintf('<span class="badge badge-danger">%d</span>',$count) : '']),
            ];
        }
        if(setting_item('user_enable_2fa'))
        {
            $res['chat'] = [
                'position' => 51,
                'icon' => '',
                'url' => route('user.2fa'),
                'title' => __("2F Authentication"),
            ];
        }

        return $res;
    }
}
