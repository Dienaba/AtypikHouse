<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\User\Controllers;


use Modules\FrontendController;

class TwoFactorController extends FrontendController
{

    public function index(){
        if(!setting_item('user_enable_2fa')){
            return redirect('/');
        }
        $data = [
            'page_title'=>__("Two Factor Authentication")
        ];
        return view('User::frontend.2fa.index',$data);
    }
}
