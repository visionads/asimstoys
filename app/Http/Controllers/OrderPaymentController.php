<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DeliveryDetails;
use App\OrderHead;
use App\OrderPaymentTransaction;
use Illuminate\Http\Request;
use DB;
use Session;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_paid_index()
    {

        $pageTitle = "Order (Paid)";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.invoice_type','eway')
            ->orderBy('order_head.id','desc')
            ->get();


        return view('order_payment.order_paid_index',['pageTitle' => $pageTitle,'data' => $data]);
    }


    public function order_show($order_head_id){

        $order = OrderHead::with('relOrderDetail')->where('invoice_type', 'eway')->where('id', $order_head_id)->get();




        $delivery_data = DeliveryDetails::where('user_id',Session::get('user_id'))->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_paid_index',[
            'order' => $order,
            'title' => $title,
            'get_customer_data' => $get_customer_data,
            'delivery_data' => $delivery_data,
            'order_head_id'=>$order_head_id,
        ]);


    }




    public function lay_by_index()
    {
        $pageTitle = "Lay By Order";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.invoice_type','layby')
            ->orderBy('order_head.id','desc')
            ->get();

        return view('order_payment.lay_by_index',['pageTitle' => $pageTitle,'data' => $data]);
    }

}