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

        $checkout->request->charge = false;
        $checkout->request->currency_code = "AUD";
        $checkout->request->txn_id = false;
        $checkout->request->order_id =  $invoice_number; //$this->_current_order_id;
        $checkout->request->in_store = false;

        #$checkout->request->cart_url    = "https://your-domain/checkout/cart/";
        $checkout->request->success_url = "{{route('redirect_e_way_d', [$invoice_number, $order_head->net_amount, $customer_data->id])}}";
        #$checkout->request->cancel_url  = "https://your-domain/zipmoney/express/cancel/";
        #$checkout->request->error_url   = "https://your-domain/zipmoney/express/error/";
        #$checkout->request->refer_url   = "https://your-domain/zipmoney/express/refer/";
        #$checkout->request->decline_url = "https://your-domain/zipmoney/express/decline/";

        // Order Info
        $order = new \zipMoney\Request\Order;
        $order->id = $invoice_number or null;
        $order->tax = 0;
        $order->shipping_tax = 0;
        $order->shipping_value = 1;
        $order->total = $order_head->net_amount;

        // Order Item 1
        foreach ($order_detail as  $value)
        {

            $order_item = new \zipMoney\Request\OrderItem;
            $order_item->id = $value->product_id;
            $order_item->sku  = $value->product_id;
            $order_item->name = $value->product_id;
            $order_item->price =  $value->price;
            $order_item->quantity = $value->qty;

            $order->detail[] = $order_item;
        }


        $checkout->request->order = $order;

        // Billing Address
        $billingAddress  = new \zipMoney\Request\Address;

        $billingAddress->first_name = $customer_data->first_name;
        $billingAddress->last_name = $customer_data->last_name;
        $billingAddress->line1 = $customer_data->suburb;
        $billingAddress->line2 = $customer_data->suburb;
        $billingAddress->country = $customer_data->country;
        $billingAddress->zip = $customer_data->postcode;
        $billingAddress->city = $customer_data->state;
        $billingAddress->state = $customer_data->state;

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

            print_r($response);
            exit();
            $url = "https://account.sandbox.zipmoney.com.au/?o=26035";

            if($response->isSuccess()){
                //Do Something
                header('Location: [URL]');

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