<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Booking\Models;

use App\BaseModel;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Tour\Models\Tour;
use Modules\User\Emails\CreditPaymentEmail;
use Modules\User\Emails\VendorRegisteredEmail;
use Modules\User\Models\Wallet\Transaction;

class Payment extends BaseModel
{
    protected $table = 'bravo_booking_payments';
    protected $meta_json = null;

    public function save(array $options = [])
    {
        if (empty($this->code))
            $this->code = $this->generateCode();
        return parent::save($options); // 
    }

    public function getStatusNameAttribute()
    {
        return booking_status_to_text($this->status);
    }

    public function getGatewayObjAttribute()
    {
        return $this->payment_gateway ? get_payment_gateway_obj($this->payment_gateway) : false;
    }

    public function generateCode()
    {
        return md5(uniqid() . rand(0, 99999));
    }

    public function notifyObject(){
        switch ($this->object_model){
            case "wallet_deposit":
                $user = User::find($this->object_id);
                if($this->status != 'completed'){
                    $url = route('user.wallet');
                    return [false,__("Payment fail"),$url];
                }
                if(!empty($user)){
                    try {
                        $user->creditPaymentUpdate($this);
                    }catch (\Exception $exception){
                        $url =  route('user.wallet');
                        return [false,$exception->getMessage(),$url];
                    }

                    $url = route('user.wallet');
                    return [true,__("Payment updated"),$url];
                }

                break;

        }
    }

    public function markAsFailed($logs = ''){
        $this->status = 'fail';
        $this->logs = \GuzzleHttp\json_encode($logs);
        $this->save();
        $this->sendUpdatedPurchaseEmail();
        return $this->notifyObject();
    }
    public function markAsCancel($logs = ''){
        $this->status = 'cancel';
        $this->logs = \GuzzleHttp\json_encode($logs);
        $this->save();
        $this->sendUpdatedPurchaseEmail();
        return $this->notifyObject();
    }

    public function markAsCompleted($logs = ''){
        $this->status = 'completed';
        $this->logs = \GuzzleHttp\json_encode($logs);
        $this->save();
        $this->sendNewPurchaseEmail();
        return $this->notifyObject();
    }


    public function getMeta($key = '', $default = '')
    {
        if(!$key){
            return PaymentMeta::query()->get()->toArray();
        }
        $val = PaymentMeta::query()->where([
            'payment_id' => $this->id,
            'name'       => $key
        ])->first();
        if (!empty($val)) {
            return $val->val;
        }
        return $default;
    }

    public function getJsonMeta($key, $default = [])
    {
        $meta = $this->getMeta($key, $default);
        if(empty($meta)) return false;
        return json_decode($meta, true);
    }

    public function addMeta($key, $val, $multiple = false)
    {

        if (is_object($val) or is_array($val))
            $val = json_encode($val);
        if ($multiple) {
            return PaymentMeta::create([
                'name'       => $key,
                'val'        => $val,
                'payment_id' => $this->id
            ]);
        } else {
            $old = PaymentMeta::query()->where([
                'payment_id' => $this->id,
                'name'       => $key
            ])->first();
            if ($old) {
                $old->val = $val;
                return $old->save();

            } else {
                return PaymentMeta::create([
                    'name'       => $key,
                    'val'        => $val,
                    'payment_id' => $this->id
                ]);
            }
        }
    }



    public function sendUpdatedPurchaseEmail(){

        switch ($this->object_model){
            case "wallet_deposit":
                Mail::to(setting_item('admin_email'))->send(new CreditPaymentEmail(false, $this, 'admin'));
                if($this->user)
                    Mail::to($this->user->email)->send(new CreditPaymentEmail(false, $this, 'customer'));
            break;
        }

    }

    public function sendNewPurchaseEmail(){

        switch ($this->object_model) {
            case "wallet_deposit":
                Mail::to(setting_item('admin_email'))->send(new CreditPaymentEmail(true, $this, 'admin'));

                if ($this->user)
                    Mail::to($this->user->email)->send(new CreditPaymentEmail(true, $this, 'customer'));
        }
    }

}
