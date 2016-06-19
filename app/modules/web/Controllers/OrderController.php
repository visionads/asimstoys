<?php

namespace App\Modules\Web\Controllers;
use App\Helpers\GenerateNumber;
use App\Helpers\RttTntExpress;
use App\Helpers\TntExpress;
use App\OrderDetail;
use App\OrderHead;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ProductGroup;
use App\Customer;
use App\DeliveryDetails;
use DB;
use Session;
use Input;
use Eway;
use Eway\Rapid\Enum\ApiMethod;
use Eway\Rapid\Enum\ShippingMethod;
use Eway\Rapid\Enum\TransactionType;
use Eway\Rapid\Model\Response\CreateTransactionResponse;
use Eway\Rapid;
use Eway\Rapid\Client;
use App\Helpers\SendMailer;


class OrderController extends Controller
{

    public function update_cart(Request $request){

        if(isset($_POST)){
            
            $quantity= (int) $_POST['quantity'];
            $product_id= (int) $_POST['product_id'];
            $product_index= (int) $_POST['product_index'];
            $color= $_POST['color'];

            $product_cart1 = $request->session()->get('product_cart');
            unset($product_cart1[$product_index]);

            $product_cart_2 = array( 
                    array('product_id' => $product_id,
                            'color' => $color,
                            'quantity' => $quantity
                    ) 
                );

            $result = array_merge($product_cart1, $product_cart_2);

            $set_array_value = array_values($result);
            $request->session()->set('product_cart', $set_array_value);

            return redirect('mycart');
        }
    }

    public function remove_cart(Request $request){

        if(isset($_POST)){
            $product_index= (int) $_POST['product_index'];
            $product_cart1 = $request->session()->get('product_cart');
            unset($product_cart1[$product_index]);
            $set_array_value = array_values($product_cart1);
            $request->session()->set('product_cart', $set_array_value);

            return redirect('mycart');
        }
    }

	public function add_to_cart(Request $request){

		if(isset($_POST)){

            $product_id = (int) $_POST['product_id'];
            $product_price = $_POST['price_amount'];
            $weight = $_POST['weight'];
            $volume = $_POST['volume'];

			if(isset($_POST['color'])){
				$color = $_POST['color'];
			}else{
				$color = '';
			}

            if(isset($_POST['background'])){
                $background = $_POST['background'];
            }else{
                $background = '';
            }

            if(isset($_POST['text_of_number_plate'])){
                $plate_text = $_POST['text_of_number_plate'];
            }else{
                $plate_text = '';
            }
			
            $quantity = (int) $_POST['quantity'];

            $product_cart1 = $request->session()->get('product_cart');

            $product_cart_2 = array( 
                array(
                        'product_id' => $product_id,
                        'color' => $color,
                        'quantity' => $quantity,
                        'background' => $background,
                        'product_price' => $product_price,
                        'plate_text' => $plate_text,
                        'volume' => $volume,
                        'weight' => $weight
                )
            );

            if($request->session()->has('product_cart')){

                $result = array_merge($product_cart1, $product_cart_2);
            }else{
                $result = $product_cart_2;
            }

            $request->session()->set('product_cart', $result);


			return redirect('mycart');
		}
		
	}

	public function add_to_cart_update(Request $request){
		$quantity = $_POST['quantity'];
		$request->session()->set('quantity', $quantity);
		return redirect('mycart');
	}

	public function ordercheckout(Request  $request){
        
		return redirect('customerlogin');
	}

    /*public function savedeliverydetails(Request $request)
    {
        $input = $request->all();
        $user_id = $request->session()->get('user_id');
        $input['user_id'] = $user_id;
         DB::beginTransaction();
        try {
            
            $delivery = Deliverydetails::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
            $lastInsertedId= $delivery->id;
            $request->session()->set('deliver_id', $lastInsertedId);
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());

            return redirect()->route('order-delivery-detail');
        }
        
        return redirect()->route('order-check-order');
        
    }*/

    public function savedeliverydetails(Request $request)
    {
        $input = $request->all();
        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');

        $input['user_id'] = $user_id;

        DB::beginTransaction();
        try {
            if(isset($deliver_id)) {
                $model = Deliverydetails::where('id',$deliver_id)->first();
                $model->update($input);
            }else{
                $model = new DeliveryDetails();
                $delivery = $model->create($input);
                $lastInsertedId= $delivery->id;
                $request->session()->set('deliver_id', $lastInsertedId);
            }

            //print_r($delivery);exit;

            DB::commit();
            Session::flash('flash_message', 'Successfully added!');

        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());

            return redirect()->route('order-delivery-detail');
        }

        return redirect()->route('order-check-order');

    }

    public function customerlogin(Request $request){

        
        if(Session::has('user_id')){
          return redirect()->route('order-billing-address');  
        }

        $input = $request->all();
        $password = sha1(Input::get('password'));
        $input['password'] = $password;  
        $email = Input::get('email');

        $check_customer_data = DB::table('customer')->where('email',$email)->where('password',$password)->first(); 

        if(!empty($check_customer_data)){
            $request->session()->set('user_id', $check_customer_data->id);

            if(Session::has('redirect_value') && Session::get('redirect_value') == 'myaccount' ){
                return redirect()->route(Session::get('redirect_value') );
            }else{
                return redirect()->route('mycart');
            }
            
        }else{
            Session::flash('flash_message_error', 'Username and password not match');
            return redirect()->route('customerlogin');
        }
    }

	 public function customerregister(Requests\CustomerRequest $request)
    {

    	$input = $request->all();
    	$password = sha1(Input::get('password'));
    	$input['password'] = $password;

    	 DB::beginTransaction();
        try {
            
            $customer = Customer::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
            $lastInsertedId= $customer->id;
            $request->session()->set('user_id', $lastInsertedId);
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());

            return redirect()->route('register');	
        }
        $product_id = $request->session()->get('product_id');

        if(!empty($product_id)){
        	return redirect()->route('order-billing-address');
        }else{
        	return redirect()->route('customerlogin');	
        }
        
    }


    public function customersavebilling(Request $request){

        $user_id = $request->session()->get('user_id');
        $model = Customer::where('id',$user_id)->first();

        $input = $request->all();
       

         DB::beginTransaction();
        try {
            
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
            
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());

            return redirect()->route('order-billing-address');   
        }
        
        return redirect()->route('order-delivery-detail');
    }

    public function billingaddress(Request $request){
    	$user_id = $request->session()->get('user_id');
    	$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
    	$billing_data = DB::table('customer')->where('id',$user_id)->first();
    	$title = "Billing address | Asims Toy";

    	$data = DB::table('customer')->where('id',$user_id)->first();
    	return view('web::cart.billingaddress',[
                'billing_data' => $billing_data,
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'data' => $data
            ]);
    }

    public function deliverydetails(Request $request){
        $user_id = $request->session()->get('user_id');
        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $billing_data = DB::table('customer')->where('id',$user_id)->first();
        $title = "Delivery details | Asims Toy";

        $data = DB::table('customer')->where('id',$user_id)->first();
        return view('web::cart.deliverydetails',[
                'billing_data' => $billing_data,
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'data' => $data
            ]);
    }

    public function orderconfirm(Request $request){

        $title ="mycart | Asim's Toy";

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        $product_cart = $request->session()->get('product_cart');

        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');

        $user_data = DB::table('customer')->where('id',$user_id)->first();
        $delivery_data = DB::table('delivery_details')->where('id',$deliver_id)->orderBy('id', 'desc')->first();

        //Freight Calculation if session the forget first
        if(Session::has('freight_calculation')){
            $request->session()->forget('freight_calculation');
        }

        //Freight Calculation for RTT TNT Express
        $freight_calculation = RttTntExpress::rtt_call($user_data, $delivery_data, $product_cart);
        #print_r($freight_calculation);exit();
        $request->session()->set('freight_calculation', $freight_calculation);


        return view('web::cart.finalcart',[
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'product_cart_r' => $product_cart,
                'user_data' => $user_data,
                'delivery_data' => $delivery_data,
                'freight_calculation' => $freight_calculation,
            ]);
    }


    public function paynow(Request $request)
    {

        $title ="mycart | Asim's Toy";
        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $product_id = $request->session()->get('product_id');
        $quantity = $request->session()->get('quantity');
        $color = $request->session()->get('color');
        $background = @$request->session()->get('background');
        $plate_text = @$request->session()->get('plate_text');
        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');
        $freight_calculation = $request->session()->get('freight_calculation');

        $user_data = DB::table('customer')->where('id',$user_id)->first();
        $delivery_data = DB::table('delivery_details')->where('id',$deliver_id)->orderBy('id', 'desc')->first();

        //Store to Order Head and Details
        $product_cart = $request->session()->get('product_cart');
        if($product_cart){
            $gen_number = GenerateNumber::generate_number();

            //Total Price
            $total_price = 0;
            foreach ($product_cart as $product){
                $product = DB::table('product')->where('id',$product['product_id'])->first();
                $total_price += $product->sell_rate;
            }

            $order_head_data = [
                'invoice_no'=>$gen_number[0],
                'user_id'=>$user_id,
                'total_discount_price'=>0,
                'vat'=>0,
                'freight_amount' => $freight_calculation,
                'sub_total' => $total_price,
                'net_amount'=>$total_price+$freight_calculation,
                'status'=> 1,
            ];

            try{
                $model = new OrderHead();
                if($order_head = $model->create($order_head_data)){

                    foreach ($product_cart as $products){
                        $product = DB::table('product')->where('id',$products['product_id'])->first();

                        $model_order_dt = new OrderDetail();
                        $model_order_dt->order_head_id = $order_head->id;
                        $model_order_dt->product_id =$products['product_id'];
                        $model_order_dt->product_variation_id = $products['color'];
                        $model_order_dt->qty = $products['quantity'];
                        $model_order_dt->color = @$products['color'];
                        $model_order_dt->background_color = @$products['background'];
                        $model_order_dt->plate_text = @$products['plate_text'];
                        $model_order_dt->price = $product->sell_rate;
                        $model_order_dt->status =1;
                        $model_order_dt->save();
                    }
                    #$request->session()->forget('freight_calculation');
                    $request->session()->forget('product_cart');
                    $request->session()->set('invoice_no', $gen_number[0]);
                    $request->session()->set('total_price', $total_price);
                    $request->session()->set('customer_data', $user_data);

                    Session::flash('flash_message', 'Success !');

                }
            }catch(\Exception $e){
                Session::flash('flash_message_error', $e->getMessage());
            }
        }else{
            Session::flash('flash_message_error', "No Product is available in cart");
            return redirect()->route('mycart');
        }

        return redirect()->route('payment_process_secure');


    }


    public function payment_process_secure(Request $request){

        $title ="Secure Payment | Asim's Toy";

        $invoice_number = $request->session()->get('invoice_no');
        $user_id = $request->session()->get('user_id');
        $total_price = $request->session()->get('total_price');
        $customer_data = $request->session()->get('customer_data');

        return view('web::cart.paycart',[
            'title' => $title,
            'invoice_number' => $invoice_number,
            'user_id' => $user_id,
            'total_price' => $total_price,
            'customer_data' => $customer_data,
        ]);

    }

    public function payment_method_complete(Request $request){

        $title = "Complete the Payment ";
        $input_data = $request->all();

        if($input_data['payment_method']=='e_way'){

            $invoice_number = $request->session()->get('invoice_no');
            $user_id = $request->session()->get('user_id');
            $total_price = $request->session()->get('total_price');
            $customer_data = $request->session()->get('customer_data');
            $freight_calculation = $request->session()->get('freight_calculation');

            // Update Invoice
            DB::table('order_head')->where('invoice_no', $invoice_number)->update(['invoice_type' => 'eway']);

           # $request->session()->forget('product_cart');

            return view('web::cart.e_way_payment',[
                'title' => $title,
                'invoice_number' => $invoice_number,
                'user_id' => $user_id,
                'eway_total_price_format' => ($total_price+$freight_calculation)*100,
                'total_price' => $total_price+$freight_calculation,
                'customer_data' => $customer_data,
            ]);

        }else{
            // Update Invoice
            $invoice_number = $request->session()->get('invoice_no');
            DB::table('order_head')->where('invoice_no', $invoice_number)->update(['invoice_type' => 'layby']);
            $order_head = OrderHead::where('invoice_no', $invoice_number)->first();

            Session::flash('flash_message', "Successfully Added Lay-by Process.");
            #return redirect()->route('lay_by_order_lists');
            return redirect()->route('details_of_lay_by', $order_head->id);
        }


    }

    /**
     * @param $invoice_no
     * @param $amount
     * @param $customer_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect_e_way_d($invoice_no, $amount, $customer_id){

        $order_head = OrderHead::where('invoice_no', $invoice_no)->first();
        $order_head->status = 'done';



        try{
            if($order_head->save()){
                $customer = Customer::where('id', $customer_id)->first();
                $to_email = $customer->email;
                $to_name = $customer->first_name." ". $customer->last_name;

                $subject = " Payment of invoice # ".$invoice_no. " | Asims Toys ";
                $body = "Dear ".$to_name. " Your Payment is approved !";

                $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

                Session::flash('flash_message', "The Amount : ".$amount ." is DONE. Please check your email");
            }
        }catch(\exception $e){
            Session::flash('flash_message', "Payment Declined");
        }

        return redirect()->route('order_summery_lists');
    }

    /**
     * @param Request $request
     */
    public function e_way_payment(Request $request){

        $invoice_number = $request->session()->get('invoice_no');
        $user_id = $request->session()->get('user_id');
        $total_price = $request->session()->get('total_price');
        $customer_data = $request->session()->get('customer_data');

    }


}