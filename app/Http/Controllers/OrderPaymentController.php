<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DeliveryDetails;
use App\Helpers\SendMailer;
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
            ->orderBy('order_head.invoice_no','desc')
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



    public function lay_by_order_show($order_head_id){
        $title = 'Invoice Detail';

        $order = OrderHead::with('relOrderDetail', 'relOrderPaymentTransaction')->where('id', $order_head_id)->get();
        $customer_data = Customer::where('id',$order[0]->user_id)->first();

        $total_amount = DB::table('order_detail')
            ->select(DB::raw('SUM(price) as total_amount'))
            ->groupBy('order_head_id')
            ->where('order_head_id', $order_head_id)
            ->first();

        $paid_amount = DB::table('order_payment_transaction')
            ->select(DB::raw('SUM(amount) as paid_amount'))
            ->groupBy('order_head_id')
            ->where('order_head_id', $order_head_id)
            ->first();

        $due_amount = @$total_amount->total_amount - @$paid_amount->paid_amount;

        return view('order_payment.lay_by_order_details',[
            'order_data' => $order,
            'title' => $title,
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,

            'total_amount'=>$total_amount,
            'paid_amount'=>$paid_amount,
            'due_amount'=>$due_amount,
        ]);
    }


    /**
     * @param $order_trn_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel_lay_by_payment($order_trn_id)
    {

        try {
            $model = OrderPaymentTransaction::where('id',$order_trn_id)->first();
            $model->status = 'cancel';
            if ($model->save()) {

                $order_head = OrderHead::where('id', $model->order_head_id)->first();
                $invoice_no = $order_head->invoice_no;

                $customer = Customer::where('id', $order_head->user_id)->first();
                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = "Cancel Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is canceled !";

                $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', " Successfully Canceled.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }


    /**
     * @param $order_trn_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve_lay_by_transaction($order_trn_id)
    {


        try {
            $model = OrderPaymentTransaction::where('id',$order_trn_id)->first();
            $model->status = 'approved';
            if ($model->save()) {

                $order_head = OrderHead::where('id', $model->order_head_id)->first();
                $invoice_no = $order_head->invoice_no;

                $customer = Customer::where('id', $order_head->user_id)->first();
                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = "Approved Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is approved !";

                $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', " Successfully Approved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }




}