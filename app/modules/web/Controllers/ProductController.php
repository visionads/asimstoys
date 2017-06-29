<?php

namespace App\Modules\Web\Controllers;
use App\Helpers\RttTntExpress;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{

	public function index($product_slug)
    {
        
        $product = DB::table('product')->where('slug',$product_slug)->where('status','active')->first();

        if(!empty($product)){

            $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
            $related_product_r = DB::table('product')
                                ->where('product_subgroup_id',$product->product_subgroup_id)
                                ->whereNotIn('id',[$product->id])
                                ->where('status','active')
                                ->paginate(9);

            $product_single_gallery = DB::table('gal_image')->where('product_id',$product->id)->first();
            $product_gallery_all = DB::table('gal_image')->where('product_id',$product->id)->get();
            $product_variation = DB::table('product_variation')->where('product_id',$product->id)->get();
            $title =$product->title ." | Asim's Toy";

                return view('web::product.details',[
                    'title' => $title,
                    'product' => $product,
                    'productgroup_data' => $productgroup_data,
                    'product_single_gallery' => $product_single_gallery,
                    'product_gallery_all' => $product_gallery_all,
                    'related_product_r' => $related_product_r,
                    'product_variation_r' => $product_variation
                ]);

        }else{

            $title = "Found Not Found";

            return view('web::product.not_found',[
                    'title' => $title
                ]);

        }
		

	}


    public function freight_cal_by_product(Request $request)
    {
        // Getting all post data
        $input = $request->all();
        $product_id = $input['product_id'];


        $product_data = Product::where('id',$product_id)->get()->toArray();

        $user_data= null;
        $delivery_data= $request->all();


        //Freight Calculation for RTT TNT Express
        $freight_calculation = RttTntExpress::rtt_call($user_data, $delivery_data, $product_data);
        if(count($freight_calculation)>1)
        {
            $cal = "Shipping method : ".$freight_calculation[0]['description'][0]." and Cost :".$freight_calculation[0]['price'][0];
        }
        else
        {
            $cal = $freight_calculation;
        }
        $active_fc = 'active';


        return redirect()->back()->with('cal', $cal)->with('active_fc', $active_fc);


    }
}