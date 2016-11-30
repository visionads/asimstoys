<?php

namespace App\Http\Controllers;

use App\Article;
use App\Filter;
use App\Helpers\PostSearch;
use App\Helpers\RttExpress;
use App\Helpers\RttTntExpress;
use App\Menu;
use App\SenderEmail;
use App\User;
use DB;
use Illuminate\Contracts\Logging\Log;
use Session;
//use App\Helpers\Xmlapi;
use App\Imap;
use App\Smtp;
use Illuminate\Support\Facades\Input;
use Queue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserResetPassword;
use App\Helpers\MenuHelper;
use App\Helpers\TntExpress;
use zipMoney;
use zipMoney\Request\Version;


class HomeController extends Controller
{

    public function index()
    {
        if(Session::has('email')) {
            return redirect()->route('user.dashboard');
        }
        else{
            return view('user.login.login');
        }
    }

    public function user_dashboard(){

        #Log::info('Showing user profile for user: ');
        /*$menu = Menu::with('relMenu')
            ->where('menu_type_id', 1)
            #->orderBy('order', 'asc')
            ->groupBy('parent')
            ->get();
        print_r($menu);exit();*/

        /*$menu = MenuHelper::getMenu();
        print_r($menu);
        exit();*/



        $user_type = User::Where('type','admin')->first();
        return view('dashboard.index',['user_type'=>$user_type]);
    }



    public function xml_data(){

        $user_data=null;
        $delivery_data=null;
        $product_cart=null;
        
        $res = RttTntExpress::rtt_call($user_data, $delivery_data, $product_cart);
        print_r($res);


    }


    public function zip_pay()
    {
        /*
        SANDBOX
        Merchant ID: 3075 
        API Signature: TRjrjwZSprkucEtpL9BNOZPpkjydDIAk0Rlh7iYYbc0=
        Unique Id: daef00bf-536f-41b2-9bc7-2f1a47fc1742
         */

        zipMoney\Configuration::$merchant_id  = 3075;
        zipMoney\Configuration::$merchant_key = 'TRjrjwZSprkucEtpL9BNOZPpkjydDIAk0Rlh7iYYbc0=';
        zipMoney\Configuration::$environment  = 'sandbox'; //sandbox|production;


        # Initialize the checkout
        $checkout = new \zipMoney\Api\Checkout();

        $checkout->request->charge = false;
        $checkout->request->currency_code = "AUD";
        $checkout->request->txn_id = false;
        $checkout->request->order_id =  "ord-001"; //$this->_current_order_id;
        $checkout->request->in_store = false;

        $checkout->request->cart_url    = "https://your-domain/checkout/cart/";
        $checkout->request->success_url = "https://your-domain/checkout/success/";
        $checkout->request->cancel_url  = "https://your-domain/zipmoney/express/cancel/";
        $checkout->request->error_url   = "https://your-domain/zipmoney/express/error/";
        $checkout->request->refer_url   = "https://your-domain/zipmoney/express/refer/";
        $checkout->request->decline_url = "https://your-domain/zipmoney/express/decline/";

        // Order Info
        $order = new \zipMoney\Request\Order;
        $order->id = 1;
        $order->tax = 110;
        $order->shipping_tax = 0;
        $order->shipping_value = 10;
        $order->total = 120;

        // Order Item 1
        $order_item = new \zipMoney\Request\OrderItem;
        $order_item->id = 10758;
        $order_item->sku  = "item-10758"; 
        $order_item->name = "GoPro Hero3+ Silver Edition - Silver";
        $order_item->price =  110;
        $order_item->quantity = 1; 

        $order->detail[] = $order_item;

        // Order Item 2
        $order_item = new \zipMoney\Request\OrderItem;
        $order_item->id = 10759;
        $order_item->sku  = "item-10759"; 
        $order_item->name = "GoPro Hero3+ Silver Edition - Silver1";
        $order_item->price =  110;
        $order_item->quantity = 1;

        $order->detail[] = $order_item;

        $checkout->request->order = $order;

        // Billing Address
        $billingAddress  = new \zipMoney\Request\Address;

        $billingAddress->first_name = "firstname";
        $billingAddress->last_name = "lastname";
        $billingAddress->line1 = "line1";
        $billingAddress->line2 = "line2";
        $billingAddress->country = "Australia";
        $billingAddress->zip = "postcode";
        $billingAddress->city = "Sydney";
        $billingAddress->state = "NSW";

        $checkout->request->billing_address  = $billingAddress;

        // Shipping Address
        $shippingAddress = new \zipMoney\Request\Address;

        $shippingAddress->first_name = "firstname";
        $shippingAddress->last_name = "lastname";
        $shippingAddress->line1 = "line1";
        $shippingAddress->line2 = "line2";
        $shippingAddress->country = "Australia";
        $shippingAddress->zip = "postcode";
        $shippingAddress->city = "Sydney";
        $shippingAddress->state = "NSW";

        $checkout->request->shipping_address  = $shippingAddress;


        // Consumer Info
        $consumer  = new \zipMoney\Request\Consumer;

        $consumer->first_name = "firstname";
        $consumer->last_name = "lastname";
        $consumer->phone = 0400000000;
        $consumer->email = "test@test.com.au";
        $consumer->gender = "male";
        $consumer->dob = "2016-06-16T15:31:23.8051383+10:00";
        $consumer->title = "mr";

        $checkout->request->consumer  = $consumer;
        $checkout->request->version = new Version();
        $checkout->request->version->platform = "php";



        try{
          $response = $checkout->process();

          if($response->isSuccess()){
            //Do Something
              print_r($response);
              echo "Success !";
          } else {
            //Handle Error
              echo "Error !";
          }

        } catch (Exception $e){
            // Handle Error
            echo "Exception !";
        }
        

        exit("-----");




    }














}