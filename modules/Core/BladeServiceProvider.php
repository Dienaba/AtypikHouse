<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services on the site
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Adds a directive in Blade for actions on the site
         */
        Blade::directive('do_action', function ($expression) {
            return "<?php do_action({$expression}); ?>";
        });
        /*
         * Adds a directive in Blade for filters on the AtypikHouse
         */
        Blade::directive('apply_filters', function ($expression) {
            return "<?php echo apply_filters({$expression}); ?>";
        });
    }
}
