<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Models\Settings;

class StyleController extends Controller
{
    public function customCss(){
        $value = Cache::rememberForever('custom_css_' . app()->getLocale(), function (){
            return view('Layout::parts.custom-css')->render();
        });
        return response($value,200,[
            'Content-Type'=>'text/css; charset=UTF-8'
        ]);
    }
}
