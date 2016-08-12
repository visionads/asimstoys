<?php

namespace App\Modules\Web\Controllers;
use App\Customer;
use App\DeliveryDetails;
use App\OrderHead;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;
use Session;
use App\OrderPaymentTransaction;
use Illuminate\Support\Facades\Input;
use App\Helpers\SendMailer;
use App\Product;


class AccountsController extends Controller
{
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }



    public function myaccount(Request $request){

        if(Session::has('user_id')){

            $request->session()->set('redirect_value', '');
            $title ="My Accounts | Asim's Toy";

            $get_customer_data = DB::table('customer')->where('id',Session::get('user_id'))->first();

            /*$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
            $get_order_history = DB::table('order_head')
                //->join('order_detail', 'order_head.id', '=', 'order_detail.order_head_id')
                ->where('order_head.user_id',Session::get('user_id'))
                ->where('order_head.invoice_type','eway')
                ->orderBy('order_head.id','desc')
                ->get();
             $get_layby_history = DB::table('order_head')
                //->join('order_detail', 'order_head.id', '=', 'order_detail.order_head_id')
                ->where('order_head.user_id',Session::get('user_id'))
                ->where('order_head.invoice_type','layby')
                ->orderBy('order_head.id','desc')
                ->get();
            $delivery_data = DB::table('delivery_details')->where('user_id',Session::get('user_id'))->orderBy('id','desc')->first(); */

            return view('web::accounts.accounts',[
                'title' => $title,
                #'productgroup_data' => $productgroup_data,
                'get_customer_data' => $get_customer_data,
                #'get_order_history' => $get_order_history,
                #'delivery_data' => $delivery_data,
                #'get_layby_history' => $get_layby_history
            ]);


        }else{
            $request->session()->set('redirect_value', 'myaccount');
            return redirect('customerlogin');

        }

        
    }

    public function order_summery_lists(Request $request){

        if(Session::has('user_id')){

            $request->session()->set('redirect_value', '');
            $title ="My Accounts | Asim's Toy";


            $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
            $get_order_history = DB::table('order_head')
                //->join('order_detail', 'order_head.id', '=', 'order_detail.order_head_id')
                ->where('order_head.user_id',Session::get('user_id'))
                ->where('order_head.invoice_type','eway')
                ->orderBy('order_head.id','desc')
                ->get();

            return view('web::accounts.ordersummary',[
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'get_order_history' => $get_order_history,
            ]);


        }else{
            $request->session()->set('redirect_value', 'myaccount');
            return redirect('customerlogin');

        }


    }


    public function lay_by_order_lists(Request $request){

        if(Session::has('user_id')){

            $request->session()->set('redirect_value', '');
            $title ="My Accounts | Asim's Toy";

            $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

            $get_layby_history = DB::table('order_head')
                ->where('order_head.user_id',Session::get('user_id'))
                ->where('order_head.invoice_type','layby')
                ->orderBy('order_head.id','desc')
                ->get();

            return view('web::accounts.layby',[
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'get_layby_history' => $get_layby_history
            ]);


        }else{
            $request->session()->set('redirect_value', 'myaccount');
            return redirect('customerlogin');

        }


    }


    public function details_of_lay_by($order_head_id)
    {
		
		$freight_data = DB::table('order_head')
						->where(['id' => $order_head_id])
						->first();
						
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

        $due_amount = (@$total_amount->total_amount + $freight_data->freight_amount) - @$paid_amount->paid_amount;

        $order = OrderHead::with('relOrderDetail')->where('invoice_type', 'layby')->where('id', $order_head_id)->get();
        $order_pay_trn = OrderPaymentTransaction::where('order_head_id', $order_head_id)->get();

        $get_customer_data = Customer::where('id',Session::get('user_id'))->first();
        $delivery_data = DeliveryDetails::where('user_id',Session::get('user_id'))->orderBy('id','desc')->first();

        $title = 'Invoice Detail';


        return view('web::accounts.order_details',[
            'order' => $order,
			'freight_data' => $freight_data,
            'order_pay_trn' => $order_pay_trn,
            'title' => $title,
            'get_customer_data' => $get_customer_data,
            'delivery_data' => $delivery_data,
            'total_amount'=>$total_amount,
            'paid_amount'=>$paid_amount,
            'due_amount'=>$due_amount,
            'order_head_id'=>$order_head_id,
        ]);


    }


    /**
     * @param $order_head_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lay_by_pay_option($order_head_id){

        $order_data = OrderHead::where('id', $order_head_id)->first();
        $title = 'Invoice Detail';

        $customer_data = DB::table('customer')->where('id',Session::get('user_id'))->first();

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

        $due_amount = (@$total_amount->total_amount + @$order_data->freight_amount) - @$paid_amount->paid_amount;

        return view('web::accounts.lay_by_pay_option',[
            'title' => $title,
            'order_data'=>$order_data,
            'total_amount'=>$total_amount,
            'paid_amount'=>$paid_amount,
            'due_amount'=>$due_amount,
            'customer_data'=>$customer_data
        ]);


    }


    public function step_final_payment_for_layby(){

        if($this->isGetRequest()){
            $payable_amount = abs(Input::get('amount'));
            $order_head_id = Input::get('order_head_id');


            $order_data = OrderHead::where('id', $order_head_id)->first();
            $title = 'Invoice Detail';

            $customer_data = DB::table('customer')->where('id',Session::get('user_id'))->first();

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

            return view('web::accounts.final_step_lay_option',[
                'title' => $title,
                'order_data'=>$order_data,
                'total_amount'=>$total_amount,
                'paid_amount'=>$paid_amount,
                'due_amount'=>$due_amount,
                'customer_data'=>$customer_data,
                'amount'=>$payable_amount,
                'payable_amount'=>$payable_amount,
            ]);
        }else{
            return redirect()->back();
        }

    }


    /**
     * @param $invoice_no
     * @param $amount
     * @param $customer_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function partial_lay_by_redirect_eway($invoice_no, $amount, $customer_id){

        $order_head = OrderHead::where('invoice_no', $invoice_no)->first();
        $customer = Customer::where('id', $customer_id)->first();

        //Order Payment Transaction
        $order_trn = new OrderPaymentTransaction();
        $order_trn->order_head_id = $order_head->id;
        $order_trn->customer_id = $customer->id;
        $order_trn->payment_type ='eway';
        $order_trn->amount = $amount;
        $order_trn->date = date('Y-m-d H:i:s');
        $order_trn->transaction_no = 'eway';
        $order_trn->gateway_name = 'eway';
        $order_trn->gateway_address ='eway';
        $order_trn->status = 'approved';

        try{
            if($order_trn->save()){

                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = " Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is approved !";

                #$mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', "The Amount : ".$amount ." is DONE. Please check your email");
            }
        }catch(\exception $e){
            Session::flash('flash_message', "Payment Declined");
        }

        return redirect()->route('lay_by_order_lists');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bank_partial_payment_submit(Request $request){

        $input_data = $request->all();

        try{
            $model = new OrderPaymentTransaction();
            $model->order_head_id = $input_data['order_head_id'];
            $model->customer_id = $input_data['customer_id'];
            $model->payment_type = $input_data['payment_type'];
            $model->amount = $input_data['amount'];
            $model->date = date('Y-m-d H:i:s');
            $model->transaction_no = $input_data['transaction_no'];
            $model->gateway_name = $input_data['gateway_name'];
            $model->gateway_address = $input_data['gateway_address'];
            $model->status = 'pending';

            $model = $model->save();
        }catch(\Exception $e){
            $model = $e->getMessage();
        }


        Session::flash('flash_message', "Successfully Added Lay-by Payment.");
        return redirect()->route('details_of_lay_by', $input_data['order_head_id']);
    }



    public function details_of_order_summery($order_head_id){

        $order = OrderHead::with('relOrderDetail')->where('invoice_type', 'eway')->where('id', $order_head_id)->get();

        $get_customer_data = Customer::where('id',Session::get('user_id'))->first();

        $delivery_data = DeliveryDetails::where('user_id',Session::get('user_id'))->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('web::accounts.order_summery_details',[
            'order' => $order,
            'title' => $title,
            'get_customer_data' => $get_customer_data,
            'delivery_data' => $delivery_data,
            'order_head_id'=>$order_head_id,
        ]);


    }


}