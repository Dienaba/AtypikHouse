<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\User\Fortify;


use App\Helpers\ReCaptchaEngine;
use App\Rules\ValidCaptcha;
use Illuminate\Support\MessageBag;

class LoginRequest extends \Laravel\Fortify\Http\Requests\LoginRequest
{

    public function rules()
    {
        $rules =  parent::rules(); // 
        if (ReCaptchaEngine::isEnable() and setting_item("user_enable_login_recaptcha")) {
            $rules['g-recaptcha-response'] = ['required',new ValidCaptcha()];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required'=>__('Please verify the captcha'),
        ];
    }
}
