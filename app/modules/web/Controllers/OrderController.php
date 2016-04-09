<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ProductGroup;
use App\Customer;
use App\Deliverydetails;
use DB;
use Session;
use Input;

class OrderController extends Controller
{


	public function add_to_cart(Request $request){

		if(isset($_POST)){
			$product_id = $_POST['product_id'];
			if(isset($_POST['color'])){
				$color = $_POST['color'];	
			}else{
				$color = '';
			}
			
			$quantity = $_POST['quantity'];

			$request->session()->set('product_id', $product_id);
			$request->session()->set('color', $color);
			$request->session()->set('quantity', $quantity);

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

    public function savedeliverydetails(Request $request)
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
            return redirect()->route('mycart');
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

        $product_id = $request->session()->get('product_id');
        $quantity = $request->session()->get('quantity');
        $color = $request->session()->get('color');
        $user_id = $request->session()->get('user_id');
        $deliver_id = $request->session()->get('deliver_id');

        $user_data = DB::table('customer')->where('id',$user_id)->first();
        $delivery_data = DB::table('deliverydetails')->where('id',$deliver_id)->orderBy('id', 'desc')->first();

        $product = DB::table('product')->where('id',$product_id)->first();

        return view('web::cart.finalcart',[
                'title' => $title,
                'productgroup_data' => $productgroup_data,
                'product' => $product,
                'quantity' => $quantity,
                'color' => $color,
                'user_data' => $user_data,
                'delivery_data' => $delivery_data
            ]);
    }
}