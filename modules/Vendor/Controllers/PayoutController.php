<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Vendor\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\Vendor\Events\PayoutRequestEvent;
use Modules\Vendor\Models\VendorPayout;

class PayoutController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->setActiveMenu(route('vendor.admin.payout.index'));
    }

    public function callAction($method, $parameters)
    {
        if(setting_item('disable_payout'))
        {
            return redirect('/user/dashboard');
        }

        return parent::callAction($method, $parameters); // 
    }

    public function index(){

        $this->checkPermission('dashboard_vendor_access');
        $data = [
            'page_title'=>__("Payouts Management"),
            'breadcrumbs'=>[
                [
                    'name'  => __('Vendor dashboard'),
                    'url'=>route('vendor.dashboard')
                ],
                [
                    'name'  => __('Payouts'),
                    'class' => 'active'
                ],
            ],
            'payouts'=>VendorPayout::query()->where('vendor_id',Auth::id())->orderBy('id','desc')->paginate(20),
            'currentUser'=>Auth::user(),
            'available_payout_amount'=>Auth::user()->available_payout_amount
        ];

        return view('Vendor::frontend.payouts.index',$data);
    }

    public function storePayoutAccounts(){

        $this->checkPermission('dashboard_vendor_access');

        $user = Auth::user();

        $user->addMeta('vendor_payout_accounts',request()->input('payout_accounts'));

        return $this->sendSuccess([
            "message"=>__("Your account information has been saved")
        ]);

    }

    public function createPayoutRequest(){

        $this->checkPermission('dashboard_vendor_access');

        $vendor_payout_methods = json_decode(setting_item('vendor_payout_methods'));
        if(!is_array($vendor_payout_methods) or empty($vendor_payout_methods)){
            return $this->sendError(__("Sorry! No method available at the moment"));
        }

        $user = Auth::user();
        request()->validate([
            'amount'=>'required|max:'.$user->available_payout_amount,
            'payout_method'=>'required'
        ]);

        $amount = request()->input('amount');
        $payout_method = request()->input('payout_method');
        $user_available_methods = $user->available_payout_methods;

        if(empty($user_available_methods) or empty($user_available_methods[$payout_method])){
            return $this->sendError(__("You does not select payout method or you need to enter account info for that method"));
        }

        if($user->available_payout_amount < $amount){
            return $this->sendError(__("You don not have enough :amount for payout",['amount'=>format_money($amount)]));
        }

        $method_detail = $user_available_methods[$payout_method];

        if(!empty($method_detail->min) and $method_detail->min > $amount){
            return $this->sendError(__("Minimum amount to pay is :amount",["amount"=>format_money($method_detail->min)]));
        }

        $payout = new VendorPayout();
        $payout->payout_method = $payout_method;
        $payout->amount = $amount;
        $payout->note_to_admin = request()->input('note_to_admin');
        $payout->account_info = $method_detail->user;
        $payout->vendor_id = Auth::id();
        $payout->status = 'initial';

        if($payout->save())
        {
            event(new PayoutRequestEvent('insert',$payout));

            return $this->sendSuccess([],__("Payout request has been created"));

        }else{
            return $this->sendSuccess([],__("Can not create vendor message"));
        }

    }
}