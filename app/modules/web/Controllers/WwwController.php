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
use Input;
use App\Menu;
use App\MenuType;
use DB;
use URL;
use App\Events\Event;
use App\Events\MyWidgets;

use App\Helpers\SendMailer;


class WwwController extends Controller
{
	
	
    public function home_page()
    {
        $home_value = "14";
        $title = "Home | Asim's Toy";

        $slider_data = SliderImage::where('cat_slider_id', 1)->get();
        
        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();

        $featured_product_data = Product::where('is_featured','Yes')->where('status','active')->get();

        $data = Article::where('id', $home_value)->where('status', 'active')->first();
		
		$youtube_link = DB::table('youtube_link')->where('status','active')->limit(3)->get();
		
		//return view('web::maintaince');

        
		return view('web::layout.home_page', [
            'productgroup_data' => $productgroup_data,
            'slider_data'=>$slider_data,
            'title'=>$title,
            'data'=>$data,
            'featured_product_data' => $featured_product_data,
			'youtube_link' => $youtube_link
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
	
	public function aboutus(){
        $id = '14';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('id',$id)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }
	
	public function deliverypolicy(){
        $id = '22';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('id',$id)->first();

        $title =$data->title . " | Asim's Toy";

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
            'productgroup_data' => $productgroup_data
        ]);
    }
	
	public function privacypolicy(){
        $id = '21';

        $productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
        $data = Article::where('id',$id)->first();

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
	
	public function contactsubmit(Requests\ContactRequest $request){
		
		$input = $request->all();
		
		
		$name = Input::get('name');
		$email = Input::get('email');
		$subject = Input::get('subject');
		$message = Input::get('message');
		$phone = Input::get('phone');
		
		// Start filename change
		
		//$filename = $_POST['filename'];
		//$destinationPath = 'http://localhost/asimstoy/public/web/contact_files';
        //move_uploaded_file($filename, "$destinationPath/".$filename);
		
		// End image change
		
		
		$to_email = 'asimstoys@gmail.com';
		$to_name = 'Asims Toys | Contact';
		
		$body = "Name ".$name. "<br/><br/>Email ".$email. "<br/><br/>Subject".$subject. "<br/><br/> Phone".$phone. "<br/><br/> Message".$message;
		
		
		$mail = SendMailer::send_mail_by_php_mailer($to_email, $to_name, $subject, $body);
		
		
		if($mail){			
			Session::flash('flash_message_success', "Thank you for contacting with us. We will contact as soon as possible");
		}else{			
			Session::flash('flash_message_error', "Your message not send");
		}
		
		 return redirect('contact');
		
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
	
	public function forgotpassword(){
			
		$title = "Forgot Password | Asim's Toy";
		$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
		
		return view('web::general.forgotpassword',[
				'title' => $title,
				'productgroup_data' => $productgroup_data
		]);
	}
	
	public function recoverpassword_submit(Request $request){
		
		$input = $request->all();
		
		$password = $input['password'];
		$email_address = $input['email_address'];
		
		$exists_customer = DB::table('customer')->where('email',$email_address)->first();
		
		if(!empty($exists_customer)){
			
			$password = sha1($password);
			
			DB::table('customer')
				->where('id', $exists_customer->id)
				->update(['password' => $password]);
				
			Session::flash('flash_success', "Congratulation your password is changed.");
			
		}
		
		return redirect('forgotpassword');
		
	}
	
	public function forgotpasswordmailsend(Request $request){
		
		$input = $request->all();
		
		$email = $input['email'];
		
		$exists_customer = DB::table('customer')->where('email',$email)->first();
		
		if(!empty($exists_customer)){
			
			$str = 'abcdefghijklmnopqrst1234567890';
			$token = str_shuffle($str);
			
			DB::table('customer')
				->where('id', $exists_customer->id)
				->update(['token' => $token]);
				
			
			$to_name = $exists_customer->first_name . ' '.$exists_customer->last_name;
			$subject = "Reset Password Mail";
			$link = URL::to('/').'/recoverpassword/'.$token;
			
			$body = "Please <a href=".$link.">click here</a> to recover your password";
							
			$mail = SendMailer::send_mail_by_php_mailer($email, $to_name, $subject, $body);
			
			Session::flash('flash_message_error', "Please check your email address for further instruction.");
		}else{
			Session::flash('flash_message_error', "Your email address not found in our system.");
		}
		
		return redirect('forgotpassword');
	}
	
	public function recoverpassword($token){
		
		$token_exits = DB::table('customer')->where('token',$token)->first();
		
		if(!empty($token_exits)){
			
			$title = "Forgot Password | Asim's Toy";
			$productgroup_data = ProductGroup::where('status','active')->orderby('sortorder','asc')->get();
			
			return view('web::general.recoverpassword',[
					'title' => $title,
					'productgroup_data' => $productgroup_data,
					'token_exits' => $token_exits
			]);
			
		}else{
			return redirect('forgotpassword');
		}
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