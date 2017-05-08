<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DeliveryDetails;
use App\Helpers\SendMailer;
use App\OrderPaymentTransaction;
use Illuminate\Http\Request;
use DB;
use Session;
use Input;
use App\OrderHead;
use App\OrderDetail;
use App\Product;

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
            ->where('order_head.localpickup',NULL)            
            ->where('status', '!=', 'cancel')
			->where('status', '!=', 'archive')
            ->orwhere('order_head.localpickup','no')
            ->orderBy('order_head.invoice_no','desc')
            ->get();


        return view('order_payment.order_paid_index',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function local_pickup_order()
    {
    
        $pageTitle = "Order (Paid)";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.localpickup','yes')
            ->where('status', '!=', 'cancel')
            ->where('status', '!=', 'archive')
            ->where('invoice_type', '!=', 'NULL')
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
            ->where('order_head.localpickup',NULL)
			->where('order_head.status','!=','cancel')
			->where('status', '!=', 'archive')
            ->orwhere('order_head.localpickup','no')
            ->orderBy('order_head.id','desc')
            ->get();

        return view('order_payment.lay_by_index',['pageTitle' => $pageTitle,'data' => $data]);
    }


    public function pre_order_list()
    {
        $pageTitle = "Lay By Order";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.invoice_type','pre-order')
            ->where('order_head.localpickup',NULL)
			->where('order_head.status','!=','cancel')
			->where('status', '!=', 'archive')
            ->orwhere('order_head.localpickup','no')
            ->orderBy('order_head.id','desc')
            ->get();

        return view('order_payment.pre_order_list',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function zip_pay_order()
    {
        $pageTitle = "Zip Money Payment History";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.invoice_type','zip-pay')
            ->where('order_head.localpickup',NULL)
            ->where('order_head.status','!=','cancel')
            ->where('status', '!=', 'archive')
            ->orwhere('order_head.localpickup','no')
            ->orderBy('order_head.id','desc')
            ->get();

        return view('order_payment.zip_pay_order',['pageTitle' => $pageTitle,'data' => $data]);
    }
	
	public function archive_list()
    {
        $pageTitle = "Archive Order";

        $data = OrderHead::with('relCustomer')
            ->where('order_head.status','archive')
            ->orderBy('order_head.id','desc')
            ->get();

        return view('order_payment.archive_list',['pageTitle' => $pageTitle,'data' => $data]);
    }


    public function approve($id)
    {
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderHead::where('id',$id)->first();
            $model->status = 'approved';
            if ($model->save()) 
            {
                DB::commit();
              
                Session::flash('flash_message', " Successfully Approved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

     public function cancel($id)
    {
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderHead::where('id',$id)->first();
            $model->status = 'cancel';
            if ($model->save()) 
            {
                DB::commit();
                Session::flash('flash_message', " Successfully Canceled.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }


    /*
        Order Complete by Order Head ID
     */
    public function order_complete($order_head_id)
    {
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderHead::findOrFail($order_head_id);

            $model_order_details = OrderDetail::where('order_head_id',$order_head_id)->get();

            foreach($model_order_details as $product_list){
                
                $product_data = Product::
                        where('id',$product_list['product_id'])
                        ->where('status','active')
                        ->first();

                if(!empty($product_data)){
                    echo $product_data->stock_unit_quantity . '<br/>';

                    if($product_data->stock_unit_quantity > 0){

                        $product_data->stock_unit_quantity = $product_data->stock_unit_quantity - $product_list['qty'];
                        
                        DB::beginTransaction();
                        try {

                            $update_data = DB::table('product')
                                            ->where('id', $product_list['product_id'])
                                            ->update(['stock_unit_quantity' => $product_data->stock_unit_quantity]);
                                            DB::commit();



                        }catch (\Exception $e) {

                            //If there are any exceptions, rollback the transaction`
                            print_r($e->getMessage());
                        }
                        

                           
                        
                    }
                }
            }

            $model->status = 'done';
            if ($model->save()) 
            {
                DB::commit();
                Session::flash('flash_message', " Successfully Closed as Completed.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }
	
    /*
        Order Shipped by Order Head ID
     */
	public function order_shipped($order_head_id)
    {
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderHead::findOrFail($order_head_id);
            $model->status = 'delivered';
            if ($model->save()) 
            {
                DB::commit();
                Session::flash('flash_message', " Successfully Closed as Completed.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }
	
    /*
        Order Archived by Order Head ID
     */
	public function order_archive($order_head_id)
    {
	   /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderHead::findOrFail($order_head_id);
			
            $model->status = 'archive';
            if ($model->save()) 
            {

                DB::commit();
                Session::flash('flash_message', " Successfully archived.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }


    /*
        Lay by Order Show by Order_Head_ID
     */
    public function lay_by_order_show($order_head_id){
        $title = 'Invoice Detail';

        $order = OrderHead::with('relOrderDetail', 'relOrderPaymentTransaction')->where('id', $order_head_id)->get();
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
		$delivery_data = DB::table('delivery_details')->where('user_id',$customer_data->id)->orderBy('id', 'desc')->first();

        $total_amount = DB::table('order_detail')
            ->select(DB::raw('SUM(price) as total_amount'))
            ->groupBy('order_head_id')
            ->where('order_head_id', $order_head_id)
            ->first();

        $paid_amount = DB::table('order_payment_transaction')
            ->select(DB::raw('SUM(amount) as paid_amount'))
            ->groupBy('order_head_id')
            ->where('order_head_id', $order_head_id)
            ->where('status', '!=', 'cancel')
			->where('status', '!=', 'pending')
            ->first();

        $due_amount = @$order[0]->net_amount - @$paid_amount->paid_amount;

        return view('order_payment.lay_by_order_details',[
            'order_data' => $order,
            'title' => $title,
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
			'delivery_data' => $delivery_data,
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
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderPaymentTransaction::findOrFail($order_trn_id);
            $model->status = 'cancel';
            if ($model->save()) 
            {
                DB::commit();

                $order_head = OrderHead::findOrFail($model->order_head_id);
                $invoice_no = $order_head->invoice_no;

                $customer = Customer::findOrFail($order_head->user_id);
                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = "Cancel Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is canceled !";

                $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', " Successfully Canceled.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
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

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model = OrderPaymentTransaction::findOrFail($order_trn_id);
            $model->status = 'approved';
            if ($model->save()) 
            {
                DB::commit();

                $order_head = OrderHead::findOrFail($model->order_head_id);
                $invoice_no = $order_head->invoice_no;

                $customer = Customer::findOrFail($order_head->user_id);
                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = "Approved Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is approved !";

                $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', " Successfully Approved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }




}