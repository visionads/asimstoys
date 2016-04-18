<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;


class AccountsController extends Controller
{

    public function myaccount(Request $request){

        $title ="myaccounts | Asim's Toy";

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        $product_id = $request->session()->get('product_id');
        $quantity = $request->session()->get('quantity');
        $color = $request->session()->get('color');

        $product = DB::table('product')->where('id',$product_id)->first();

        return view('web::accounts.accounts',[
            'title' => $title,
            'productgroup_data' => $productgroup_data,
            'product' => $product,
            'quantity' => $quantity,
            'color' => $color
        ]);
    }


}