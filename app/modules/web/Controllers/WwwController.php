<?php
/**
 * Created by PhpStorm.
 * User: sr
 * Date: 12/24/15
 * Time: 11:16 AM
 */

namespace App\Modules\Web\Controllers;

use App\Article;
use App\GalImage;
use App\Media;
use App\SliderImage;
use App\ProductGroup;
use App\Product;
use App\Team;
use App\Widget;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use Session;
use App\Menu;
use App\MenuType;
use DB;
use App\Events\Event;
use App\Events\MyWidgets;


class WwwController extends Controller
{
    public function home_page()
    {
        $home_value = "about-the-asims-toy";
        $title = "Home | Asim's Toy";

        $slider_data = SliderImage::where('cat_slider_id', 1)->get();
        
        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        $featured_product_data = Product::where('is_featured','Yes')->where('status','active')->get();

        $data = Article::where('slug', $home_value)->where('status', 'active')->first();

        return view('web::layout.home_page', [
            'productgroup_data' => $productgroup_data,
            'slider_data'=>$slider_data,
            'title'=>$title,
            'data'=>$data,
            'featured_product_data' => $featured_product_data
        ]);
    }


    public function special(){
        $slug = 'special';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }

    public function termscondition(){
        $slug = 'terms-condition';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }

    public function laybyinstruction(){
        $slug = 'lay-by';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }
    

    public function warranty(){
        $slug = 'warranty';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }

    public function faq(){
        $slug = 'faq';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }

     public function contact(){
        $slug = 'contact';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('slug',$slug)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.contact', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }

    public function login(){

        if(Session::has('user_id')){
          return redirect()->route('order-billing-address');  
        }

        $title ="Login | Asim's Toy";

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        return view('web::general.login',[
                'title' => $title,
                'productgroup_data' => $productgroup_data
            ]);
    }

    public function logout(Request $request){

        $request->session()->pull('user_id');
        $request->session()->flush();

        return redirect('/');
    }

    public function register(){

        $title ="Registration | Asim's Toy";

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        return view('web::general.registration',[
                'title' => $title,
                'productgroup_data' => $productgroup_data
            ]);
    }
    


}