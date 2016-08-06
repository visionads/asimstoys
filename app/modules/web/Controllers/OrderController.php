<?php

namespace App\Modules\Web\Controllers;
use App\CouponCode;
use App\Helpers\GenerateNumber;
use App\Helpers\RttTntExpress;
use App\Helpers\TntExpress;
use App\OrderDetail;
use App\OrderHead;
use App\Product;
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


            $input = $request->all();

            $product_id = (int) $_POST['product_id'];
            $product_price = isset($input['price_asim'])? $input['price_asim'] : null; //$_POST['price_amount'];
            $weight = isset($_POST['weight'])?$_POST['weight']:null;
            $volume = isset($_POST['volume'])?$_POST['volume']:null;

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
        $input = $request->all();
        $coupon_code = $input['coupon_code'];
        $today = date('Y-m-d');

        if($coupon_code){

            $coupon_exists = CouponCode::where('code','=', $coupon_code)->where('expiry_date', '>', $today)->exists();
            if($coupon_exists){
                $coupon_data = CouponCode::where('code','=', $coupon_code)->first();

                $request->session()->set('coupon_value', $coupon_data['value']);
                $request->session()->set('coupon_code', $coupon_code);
                $request->session()->forget('coupon_status');
                $request->session()->set('coupon_status', 'Your Coupon code is Valid ! Your discount will be added into the payment ');
            }else{
                $request->session()->forget('coupon_status');
                $request->session()->set('coupon_status', ' Coupon code is invalid ! Please try again !');
            }
        }

		return redirect('customerlogin');
	}

    /*public function savedeliverydetails(Request $request)
    {
        $input = $request->all();
        $user_id = $request->session()->get('user_id');
        $input['user_id'] = $user_id;
         DB::beginTransaction();
        try {
            
            $delivery = DeliveryDetails::create($input);
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
                $model = DeliveryDetails::where('id',$deliver_id)->first();
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

        $title ="My Cart | Asim's Toy";

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        $product_cart = $request->session()->get('product_cart');
        foreach ($product_cart as $values){
            $product = Product::findOrFail($values['product_id']);
        }

        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');

        $user_data = DB::table('customer')->where('id',$user_id)->first();
        $delivery_data = DB::table('delivery_details')->where('id',$deliver_id)->orderBy('id', 'desc')->first();

        //Freight Calculation if session the forget first
        if(Session::has('freight_calculation')){
            $request->session()->forget('freight_calculation');
        }

        if($product['product_group_id'] !=6 ){
            if($product['product_group_id'] !=7 ) {
                //Freight Calculation for RTT TNT Express
                $freight_calculation = RttTntExpress::rtt_call($user_data, $delivery_data, $product_cart);
                $request->session()->set('freight_calculation', $freight_calculation);
            }else{
                $freight_calculation = 0;
                $request->session()->set('freight_calculation', 0);
            }
        }else{
            $freight_calculation = 0;
            $request->session()->set('freight_calculation', 0);
        }


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
        $input_data = $request->all();

        $title ="mycart | Asim's Toy";
        #$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $product_id = $request->session()->get('product_id');
        $quantity = $request->session()->get('quantity');
        $color = $request->session()->get('color');
        $background = @$request->session()->get('background');
        $plate_text = @$request->session()->get('plate_text');
        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');
        $freight_calculation = $input_data['freight_calculation'];//$request->session()->get('freight_calculation');

        $user_data = DB::table('customer')->where('id',$user_id)->first();
        #$delivery_data = DB::table('delivery_details')->where('id',$deliver_id)->orderBy('id', 'desc')->first();

        //Store to Order Head and Details
        $product_cart = $request->session()->get('product_cart');
        if($product_cart)
        {
            $gen_number = GenerateNumber::generate_number();

            //Total Price
            $total_price = 0;
            foreach ($product_cart as $product){
                #$product = DB::table('product')->where('id',$product['product_id'])->first();
                $total_price += $product['product_price']; //$product->sell_rate;
            }

            //coupon code
            $coupon_value = $request->session()->get('coupon_value');
            $discount_price = ($total_price * $coupon_value)/100;
            $total_discount_price = $discount_price? $discount_price: 0;

            $order_head_data = [
                'invoice_no'=>$gen_number[0],
                'user_id'=>$user_id,
                'total_discount_price'=>$total_discount_price,
                'vat'=>0,
                'freight_amount' => $freight_calculation,
                'sub_total' => $total_price - $total_discount_price, //$total_price,
                'net_amount'=> $input_data['total_amount'] - $total_discount_price, //$total_price+$freight_calculation,
                'status'=> 1,
            ];

            try{
                $model = new OrderHead();
                if($order_head = $model->create($order_head_data))
                {
                    foreach ($product_cart as $products)
                    {
                        $model_order_dt = new OrderDetail();
                        $model_order_dt->order_head_id = $order_head['id']; //$order_head->id;
                        $model_order_dt->product_id =$products['product_id'];
                        $model_order_dt->product_variation_id = $products['color'];
                        $model_order_dt->qty = $products['quantity'];
                        $model_order_dt->color = $products['color']?$products['color']:null;
                        $model_order_dt->background_color = $products['background']?$products['background']:null;
                        $model_order_dt->plate_text = $products['plate_text']?$products['plate_text']:null;
                        $model_order_dt->price = $products['product_price']?$products['product_price']:null; //$product->sell_rate;
                        $model_order_dt->status =1;
                        $model_order_dt->save();

						#$get_product_data = DB::table('product')->where('id',$product->id)->first();
						
						if($model_order_dt = $model_order_dt->save())
                        {
							//Remove from product stock
							$get_product_data = DB::table('product')->where('id',$products['product_id'])->first();
							$edited_quantity = $get_product_data->stock_unit_quantity - $products['quantity'];

                            //update stock balance
							DB::table('product')
								->where('id', $product->id)
								->update(['stock_unit_quantity' => $edited_quantity]);
						
						}

                    }
                    #$request->session()->forget('freight_calculation');
                    $request->session()->forget('product_cart');
                    $request->session()->set('invoice_no', $order_head['invoice_no']);
                    $request->session()->set('total_price', $total_price);
                    $request->session()->set('customer_data', $user_data);

                    Session::flash('flash_message', 'Success !');

                }
            }catch(\Exception $e){
                Session::flash('flash_message_error', $e->getMessage());
            }

            //send email
            /*$to_email = $user_data->email;
            $to_name = $user_data->first_name." ". $user_data->last_name;
            $subject = "Order placed  # ".$order_head->invoice_no. " | Asims Toys ";
            $body = "Dear ".$user_data->first_name. " Your Order is placed !";
            $mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);*/


        }else{
            Session::flash('flash_message_error', "No Product is available in cart");
            return redirect()->route('mycart');
        }


        return redirect()->route('payment_process_secure', array(
            'order_head_id'=>$order_head->id
        ));


    }


    public function payment_process_secure(Request $request, $order_head_id)
    {

        $title ="Secure Payment | Asim's Toy";

        $user_id = $request->session()->get('user_id');
        $total_price = $request->session()->get('total_price');
        $customer_data = $request->session()->get('customer_data');
        $freight_calculation = $request->session()->get('freight_calculation');

        $order_head = OrderHead::findOrFail($order_head_id);

        $freight_amount =isset($order_head->freight_amount) ? $order_head->freight_amount : 0;
        $sub_total =isset($order_head->sub_total) ? $order_head->sub_total : 0;
        $net_amount =isset($order_head->net_amount) ? $order_head->net_amount : 0;

        $coupon_value = $request->session()->get('coupon_value');
        $discount_price = ($sub_total * $coupon_value)/100;
        $net_amount = $net_amount - @$discount_price;

        //setter
        $request->session()->set('net_amount', $net_amount);


        return view('web::cart.paycart',[
            'title' => $title,
            'invoice_number' => $order_head['invoice_no'],
            'user_id' => $user_id,
            'total_price' => $net_amount,
            'customer_data' => $customer_data,
            'discount_price' => $discount_price?$discount_price:0,
            'net_amount' => $net_amount?$net_amount:0,
        ]);

    }

    public function payment_method_complete(Request $request)
    {

        $title = "Complete the Payment ";
        $input_data = $request->all();



        if($input_data['payment_method']=='e_way')
        {
            $invoice_number = $input_data['invoice_number'];// $request->session()->get('invoice_no');
            $order_head = OrderHead::where('invoice_no', $invoice_number)->first();

            $customer = Customer::findOrFail($order_head['user_id']);

            $user_id = $order_head['user_id']; //$request->session()->get('user_id');
            $total_price = $order_head['net_amount']; //$request->session()->get('total_price');
            $customer_data = $customer; // $request->session()->get('customer_data');
            $freight_calculation = $order_head['freight_amount']; //$request->session()->get('freight_calculation');


            // Update Invoice
            DB::table('order_head')->where('invoice_no', $invoice_number)->update(['invoice_type' => 'eway']);

           # $request->session()->forget('product_cart');

            return view('web::cart.e_way_payment',[
                'title' => $title,
                'invoice_number' => $invoice_number,
                'user_id' => $user_id,
                'eway_total_price_format' => $order_head['net_amount']*100, //($total_price+$freight_calculation)*100,
                'total_price' => $order_head['net_amount'], //$total_price+$freight_calculation,
                'customer_data' => $customer_data,
            ]);

        }else{
            // Update Invoice
            $invoice_number = $input_data['invoice_number']; //$request->session()->get('invoice_no');
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

                #$mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);

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