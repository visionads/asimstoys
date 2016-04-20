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


		$productdata = DB::table('product')->where('preorder','1')->orderBy('sort_order','asc')->get();
		
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

		$productdata = DB::table('product')->orderBy('sort_order','asc')->get();
		
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

	public function couple($main_slug,$sub_slug){

		$product_group = DB::table('groups')
							->where('slug',$main_slug)
							->first();

		$product_subgroup = DB::table('product_subgroup')
							->where('slug',$sub_slug)
							->where('product_group_id',$product_group->id)
							->first();

		$productdata = DB::table('product')
						->where('product_group_id',$product_group->id)
						->where('product_subgroup_id',$product_subgroup->id)
						->where('preorder','0')
						->orderBy('sort_order','asc')
						->get();
			
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		$title =$product_subgroup->title . " | Asim's Toy";

		return view('web::productcategory.all',[
            'title' => $title,
            'productdata' => $productdata,
            'product_subgroup' => $product_subgroup,
            'productgroup_data' => $productgroup_data
        ]);

	}


	public function index($main_slug,$sub_slug,$type){

		$product_group = DB::table('groups')->where('slug',$main_slug)->first();
		$product_subgroup = DB::table('product_subgroup')->where('slug',$sub_slug)->first();

		$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->get();
		
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

		if($type == 'by-brand'){

			if(isset($_GET) && !empty($_GET['b']) ){

				$brand_name = $_GET['b'];

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('brand',$brand_name)->get();
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->groupBy('brand')->get();

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

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('seats',$seats_name)->get();
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->groupBy('seats')->get();

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

				$productdata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->where('voltage',$voltage)->get();
			}
			$branddata = DB::table('product')->where('product_group_id',$product_group->id)->where('product_subgroup_id',$product_subgroup->id)->groupBy('voltage')->get();

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