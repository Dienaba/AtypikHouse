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
	use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cookie;

    class CookieController extends Controller
	{
		public function saveCookie(Request $request)
		{
			$name = 'booking_cookie_agreement_enable';
			echo $request->cookie($name);
			if (!isset($_COOKIE[$name])) {
			    Cookie::queue(Cookie::forever($name,1));
				return $this->sendSuccess([], 'done')->withCookie(cookie($name,1,999999));
			} else {
				return $this->sendError(__('You cant save cookie'));
			}
		}
	}