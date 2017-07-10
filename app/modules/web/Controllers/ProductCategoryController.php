<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;


class ProductCategoryController extends Controller
{

	public function preorder(){


		$productdata = DB::table('product')->where('preorder','1')->where('status','active')->orderBy('sort_order','asc')->paginate(15);
		
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		$title ="Pre order | Asim's Toy";
		$header = 'Pre order';

		return view('web::productcategory.preorder',[
            'title' => $title,
            'header' => $header,
            'productdata' => $productdata,
            'productgroup_data' => $productgroup_data
        ]);
	}

	public function layby(){

		$productdata = DB::table('product')->where('status','active')->orderBy('sort_order','asc')->get();
		
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		$title ="Lay by | Asim's Toy";

		$header = 'Lay by';

		return view('web::productcategory.preorder',[
            'title' => $title,
            'header' => $header,
            'productdata' => $productdata,
            'productgroup_data' => $productgroup_data
        ]);
	}
	
	public function ridesontoy(){
		
		$product_group = DB::table('groups')
							->where('id','3')
							->first();
							
		$title =$product_group->title . " | Asim's Toy";
		
		$productdata = DB::table('product')
						->where('product_group_id',$product_group->id)
						->where('preorder','0')
						->where('status','active')
						->orderBy('sort_order','asc')
						->paginate(15);
						
	
						
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
		
		return view('web::productcategory.all_data',[
	            'title' => $title,
	            'productdata' => $productdata,
	            'productgroup_data' => $productgroup_data,
				'product_group' => $product_group
	        ]);
	}
	
	public function product(){
		
		$title ="All Product | Asim's Toy";
		
		$productdata = DB::table('product')
						->where('status','active')
						->orderBy('sort_order','asc')
						->paginate(15);
						
	
						
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
		
		return view('web::productcategory.all_data',[
	            'title' => $title,
	            'productdata' => $productdata,
				'productgroup_data' => $productgroup_data
	        ]);
	}

	public function couple($main_slug,$sub_slug){

		$product_group = DB::table('groups')
							->where('slug',$main_slug)
							->first();
		
		$product_subgroup = DB::table('product_subgroup')
							->where('slug',$sub_slug)
							->where('product_group_id',$product_group->id)
							->first();

		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();


		$productdata = DB::table('product')
						->where('product_group_id',$product_group->id)
						->where('product_subgroup_id',$product_subgroup->id)
						->where('preorder','0')
						->where('status','active')
						->orderBy('sort_order','asc')
						->paginate(15);



			
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		$title =$product_subgroup->title . " | Asim's Toy";
		
		if($product_subgroup->id == '10' || $product_subgroup->slug == 'gift-card' || $product_subgroup->id == '20' || $product_subgroup->id == '21'){
			
			$productdata = DB::table('product')
						->where('product_group_id',$product_group->id)
						->where('product_subgroup_id',$product_subgroup->id)
						->where('preorder','0')
						->orderBy('sort_order','asc')
						->where('status','active')
						->first();

			$product_variation = DB::table('product_variation')->where('product_id',$productdata->id)->get();

			$product_gallery_all = DB::table('gal_image')->where('product_id',$productdata->id)->get();

			return view('web::productcategory.number_plates',[
	            'title' => $title,
	            'productdata' => $productdata,
	            'product_subgroup' => $product_subgroup,
	            'productgroup_data' => $productgroup_data,
	            'product_variation_r' => $product_variation,
	            'product_gallery_all' => $product_gallery_all
	        ]);

		}else{

			return view('web::productcategory.all',[
	            'title' => $title,
	            'productdata' => $productdata,
	            'product_subgroup' => $product_subgroup,
	            'productgroup_data' => $productgroup_data
	        ]);

		}
		

	}


	public function index($main_slug,$sub_slug,$type){

		$product_group = DB::table('groups')->where('slug',$main_slug)->first();
		$product_subgroup = DB::table('product_subgroup')->where('slug',$sub_slug)->first();

		$productdata = DB::table('product')
			->where('product_group_id',$product_group->id)
			->where('product_subgroup_id',$product_subgroup->id)
			->where('preorder','0')
			->where('status','active')
			->paginate(15);
		
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		if($type == 'by-brand'){

			if(isset($_GET) && !empty($_GET['b']) ){

				$brand_name = $_GET['b'];

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('brand',$brand_name)->where('status','active')->paginate(15);
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('status','active')->groupBy('brand')->get();

			$title ="By Brand | Asim's Toy";

			return view('web::productcategory.bybrand',[
                'title' => $title,
                'productdata' => $productdata,
                'product_subgroup' => $product_subgroup,
                'productgroup_data' => $productgroup_data,
                'branddata' => $branddata
            ]);
		}


		if($type == 'by-seats'){

			if(isset($_GET) && !empty($_GET['s']) ){

				$seats_name = $_GET['s'];

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('seats',$seats_name)->where('status','active')->paginate(15);
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('status','active')->groupBy('seats')->get();

			$title ="By Seat | Asim's Toy";

			return view('web::productcategory.byseat',[
                'title' => $title,
                'productdata' => $productdata,
                'product_subgroup' => $product_subgroup,
                'productgroup_data' => $productgroup_data,
                'branddata' => $branddata
            ]);
		}


		if($type == 'by-voltage'){

			if(isset($_GET) && !empty($_GET['v']) ){

				$voltage = $_GET['v'];

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('voltage',$voltage)->where('status','active')->paginate(15);
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('status','active')->groupBy('voltage')->get();

			$title ="By voltage | Asim's Toy";

			return view('web::productcategory.byvoltage',[
                'title' => $title,
                'productdata' => $productdata,
                'product_subgroup' => $product_subgroup,
                'productgroup_data' => $productgroup_data,
                'branddata' => $branddata
            ]);
		}

	}
}