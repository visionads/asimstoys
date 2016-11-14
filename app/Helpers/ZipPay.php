<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 6/17/16
 * Time: 2:36 PM
 */

namespace App\Helpers;

use App\Helpers\TntEnquiry;
use App\Product;
use DOMDocument;
use DateTimeZone;
use DateTime;
use zipMoney;
use zipMoney\Request\Version;
use Illuminate\Support\Facades\DB;


#use Faker\Provider\DateTime;

class ZipPay
{
    /**
     * @param $invoice_number
     * @param $order_head
     * @param $order_detail
     * @param $customer_data
     * @param $delivery_data
     * @throws zipMoney\Exception
     */
    public static function call_to_server($invoice_number, $order_head, $order_detail, $customer_data, $delivery_data)
    {


        /*
        SANDBOX
            Merchant ID: 3075
            API Signature: TRjrjwZSprkucEtpL9BNOZPpkjydDIAk0Rlh7iYYbc0=
            Unique Id: daef00bf-536f-41b2-9bc7-2f1a47fc1742
         */

        /*
         *  Merchant ID: 3075
            API Signature: TRjrjwZSprkucEtpL9BNOZPpkjydDIAk0Rlh7iYYbc0=
            Unique Id: daef00bf-536f-41b2-9bc7-2f1a47fc1742
         */

        zipMoney\Configuration::$merchant_id  = 3075;
        zipMoney\Configuration::$merchant_key = 'TRjrjwZSprkucEtpL9BNOZPpkjydDIAk0Rlh7iYYbc0=';
        zipMoney\Configuration::$environment  = 'sandbox'; //sandbox|production;


        # Initialize the checkout
        $checkout = new \zipMoney\Api\Checkout();

        $checkout->request->charge = true;
        $checkout->request->currency_code = "AUD";
        $checkout->request->txn_id = false;
        $checkout->request->order_id =  $invoice_number; //$this->_current_order_id;
        $checkout->request->in_store = false;

        $checkout->request->cart_url    = "http://asimstoys.com.au/mycart";
        $checkout->request->success_url = "http://asimstoys.com.au/redirect_e_way_d/".$invoice_number."/".$order_head->net_amount."/".$customer_data->id ;
        //"{{route('redirect_e_way_d', [$invoice_number, $order_head->net_amount, $customer_data->id])}}";
        $checkout->request->cancel_url  = "http://asimstoys.com.au/redirect_e_way_d/cancel/";
        $checkout->request->error_url   = "http://asimstoys.com.au/redirect_e_way_d/rror/";
        $checkout->request->refer_url   = "http://asimstoys.com.au/redirect_e_way_d/refer/";
        $checkout->request->decline_url = "http://asimstoys.com.au/redirect_e_way_d/decline/";

        // Order Info
        $order = new \zipMoney\Request\Order;
        $order->id = $invoice_number or null;
        $order->tax = 0;
        $order->shipping_tax = 0;
        $order->shipping_value = 1;
        $order->total = $order_head->net_amount + $order->shipping_value;

        // Order Item 1
        foreach ($order_detail as  $value)
        {

            $order_item = new \zipMoney\Request\OrderItem;
            $product = $customer_data = DB::table('product')->where('id',$value->product_id)->first();
            $order_item->id = $value->product_id;
            $order_item->sku  = $product->slug;
            $order_item->name = $product->title;
            $order_item->price =  $value->price;
            $order_item->quantity = $value->qty;

            $order->detail[] = $order_item;
        }


        $checkout->request->order = $order;

        // Billing Address
        $billingAddress  = new \zipMoney\Request\Address;


        $billingAddress->first_name = isset($customer_data->first_name)?$customer_data->first_name : null;
        $billingAddress->last_name = $customer_data->first_name or null;
        $billingAddress->line1 = $customer_data->first_name or null;
        $billingAddress->line2 = $customer_data->suburb or null;
        $billingAddress->country = $customer_data->country or null;
        $billingAddress->zip = $customer_data->postcode or null;
        $billingAddress->city = $customer_data->state or null;
        $billingAddress->state = $customer_data->state or null;

        $checkout->request->billing_address  = $billingAddress;

        // Shipping Address
        $shippingAddress = new \zipMoney\Request\Address;

        $shippingAddress->first_name = $delivery_data->first_name or null;
        $shippingAddress->last_name = $delivery_data->first_name or null;
        $shippingAddress->line1 = $delivery_data->first_name or null;
        $shippingAddress->line2 = $delivery_data->suburb or null;
        $shippingAddress->country = $delivery_data->country or null;
        $shippingAddress->zip = $delivery_data->postcode or null;
        $shippingAddress->city = $delivery_data->state or null;
        $shippingAddress->state = $delivery_data->state or null;

        $checkout->request->shipping_address  = $shippingAddress;


        // Consumer Info
        $consumer  = new \zipMoney\Request\Consumer;

        $consumer->first_name = $delivery_data->first_name;
        $consumer->last_name = $delivery_data->last_name;
        $consumer->phone = $delivery_data->telephone;
        $consumer->email = $delivery_data->email;
        $consumer->gender = null;
        $consumer->dob = null;
        $consumer->title = "Mr/Mrs";

        $checkout->request->consumer  = $consumer;
        $checkout->request->version = new Version();
        $checkout->request->version->platform = "php";
        

        try{
            $response = $checkout->process();

            $arr_response = $response->toArray();
            $url = $arr_response['redirect_url'];

            if($response->isSuccess()){
                //Do Something
                header('Location: '.$url);

                exit();

                $result = 'Payment Success!';
            } else {
                //Handle Error
                $result = 'Invalid Request. Please try again !';
            }

        } catch (Exception $e){
            // Handle Error
            $result = 'Oops! Something went wrong. Please try again !';
        }

        return $result;


    }

}