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
            ->where('status', '!=', 'cancel')
            ->orderBy('order_head.id','desc')
            ->get();


        return view('order_payment.order_paid_index',['pageTitle' => $pageTitle,'data' => $data]);
    }


    public function order_show($order_head_id){

        $order = OrderHead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data
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


    public function approve($id)
    {
       
        try {
            $model = OrderHead::where('id',$id)->first();
            $model->status = 'approved';
            if ($model->save()) {

              
                Session::flash('flash_message', " Successfully Approved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

     public function cancel($id)
    {
       
        try {
            $model = OrderHead::where('id',$id)->first();
            $model->status = 'cancel';
            if ($model->save()) {

              
                Session::flash('flash_message', " Successfully Canceled.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }
}