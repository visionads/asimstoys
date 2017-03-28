<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('modules'=>'Web', 'namespace' => 'App\Modules\Web\Controllers'), function() {
    //Your routes belong to this module.

/*Route::any('admin', [
    'as' => 'admin',
    'uses' => 'HomeController@user_login'
]);*/



Route::post('freight-cal-by-product',[
    'as' => 'freight-cal-by-product',
    'uses' => 'ProductController@freight_cal_by_product'
]);

Route::post('www/state_ajax',[
    'as' => 'www/state_ajax',
    'uses' => 'WwwController@state_ajax'
]);

Route::post('www/suburb_ajax',[
    'as' => 'www/suburb_ajax',
    'uses' => 'WwwController@suburb_ajax'
]);

Route::any('web', [
    'as' => 'web',
    'uses' => 'WebController@web_index'
]);

Route::any('errors',[
	'as' => 'errors',
	'uses' => 'WwwController@errors'
]);



Route::any('/', [
    'as' => 'home-page',
    'uses' => 'WwwController@home_page'
]);

Route::any('order/update_cart',[
		'as' => 'update_cart',
		'uses' => 'OrderController@update_cart'
	]);

Route::any('order/remove_cart',[
		'as' => 'remove_cart',
		'uses' => 'OrderController@remove_cart'
	]);

Route::any('special', [
    'as' => 'special',
    'uses' => 'WwwController@special'
]);

Route::any('about-us', [
    'as' => 'about-us',
    'uses' => 'WwwController@aboutus'
]);

Route::any('delivery-policy', [
    'as' => 'delivery-policy',
    'uses' => 'WwwController@deliverypolicy'
]);

Route::any('privacy-policy', [
    'as' => 'privacy-policy',
    'uses' => 'WwwController@privacypolicy'
]);

Route::any('terms-condition',[
		'as' => 'terms-condition',
		'uses' => 'WwwController@termscondition'
	]);

Route::any('lay-by-instruction',[
		'as' => 'lay-by-instruction',
		'uses' => 'WwwController@laybyinstruction'
	]);

Route::any('warranty',[
		'as' => 'warranty',
		'uses' => 'WwwController@warranty'
	]);

Route::any('faq',[
		'as' => 'faq',
		'uses' => 'WwwController@faq'
	]);

Route::any('contact',[
		'as' => 'contact',
		'uses' => 'WwwController@contact'
	]);
	
Route::any('contactsubmit',[
		'as' => 'contactsubmit',
		'uses' => 'WwwController@contactsubmit'
	]);

Route::any('customerlogin',[
		'as' => 'customerlogin',
		'uses' => 'WwwController@login'
	]);
	
Route::any('forgotpassword-mail-send',[
		'as' => 'forgotpassword-mail-send',
		'uses' => 'WwwController@forgotpasswordmailsend'
	]);
	
Route::any("recoverpassword/{token}", [
    "as"   => "recoverpassword",
    "uses" => "WwwController@recoverpassword"
]);

Route::any("recoverpassword-submit", [
    "as"   => "recoverpassword-submit",
    "uses" => "WwwController@recoverpassword_submit"
]);

Route::any('customerlogout',[
		'as' => 'customerlogout',
		'uses' => 'WwwController@logout'
	]);

Route::any('register',[
		'as' => 'register',
		'uses' => 'WwwController@register'
	]);


Route::any('mycart',[
		'as' => 'mycart',
		'uses' => 'CartController@mycart'
	]);


Route::any('remove_cart',[
		'as' => 'remove_cart',
		'uses' => 'CartController@remove_cart'
	]);


    Route::any("payment_process_secure/{order_head_id}", [
        "as"   => "payment_process_secure",
        "uses" => "OrderController@payment_process_secure"
    ]);

    Route::any("payment_method_complete", [
        "as"   => "payment_method_complete",
        "uses" => "OrderController@payment_method_complete"
    ]);

    Route::any("redirect_e_way_d/{invoice_no}/{amount}/{customer_id}", [
        "as"   => "redirect_e_way_d",
        "uses" => "OrderController@redirect_e_way_d"
    ]);

    /* Zip pay redirect url */
    
    Route::any("zip-pay-redirect_url/{invoice_no}", [
        "as"   => "zip-pay-redirect_url",
        "uses" => "OrderController@zip_pay_redirect"
    ]);

    Route::any("zip-pay-cancel/{invoice_no}", [
        "as"   => "zip-pay-cancel",
        "uses" => "OrderController@zip_pay_cancel"
    ]);
    Route::any("zip-pay-error/{invoice_no}", [
        "as"   => "zip-pay-error",
        "uses" => "OrderController@zip_pay_error"
    ]);
    Route::any("zip-pay-decline/{invoice_no}", [
        "as"   => "zip-pay-decline",
        "uses" => "OrderController@zip_pay_decline"
    ]);
    Route::any("zip-pay-refer/{invoice_no}", [
        "as"   => "zip-pay-refer",
        "uses" => "OrderController@zip_pay_refer"
    ]);


    
    Route::any("e_way_payment", [
        "as"   => "e_way_payment",
        "uses" => "OrderController@e_way_payment"
    ]);


    Route::any("zip_pay_process/{invoice_number}", [
        "as"   => "zip_pay_process",
        "uses" => "OrderController@zip_pay_process"
    ]);




    //order History
    Route::any("details_of_lay_by/{order_head_id}", [
        "as"   => "details_of_lay_by",
        "uses" => "AccountsController@details_of_lay_by"
    ]);

    Route::any("details_of_pre_order/{order_head_id}", [
        "as"   => "details_of_pre_order",
        "uses" => "AccountsController@details_of_pre_order"
    ]);


    Route::any("details_of_order_summery/{order_head_id}", [
        "as"   => "details_of_order_summery",
        "uses" => "AccountsController@details_of_order_summery"
    ]);

    Route::any("order_summery_lists", [
        "as"   => "order_summery_lists",
        "uses" => "AccountsController@order_summery_lists"
    ]);


    Route::any("lay_by_order_lists", [
        "as"   => "lay_by_order_lists",
        "uses" => "AccountsController@lay_by_order_lists"
    ]);

    Route::any("pre_order_lists", [
        "as"   => "pre_order_lists",
        "uses" => "AccountsController@pre_order_lists"
    ]);


    Route::any("lay_by_pay_option/{order_head_id}", [
        "as"   => "lay_by_pay_option",
        "uses" => "AccountsController@lay_by_pay_option"
    ]);

    Route::any("step_final_payment_for_layby", [
        "as"   => "step_final_payment_for_layby",
        "uses" => "AccountsController@step_final_payment_for_layby"
    ]);

    Route::any("partial_lay_by_redirect_eway/{invoice_no}/{amount}/{customer_id}", [
        "as"   => "partial_lay_by_redirect_eway",
        "uses" => "AccountsController@partial_lay_by_redirect_eway"
    ]);


    //Bank Deposit
    Route::any("bank_partial_payment_submit", [
        "as"   => "bank_partial_payment_submit",
        "uses" => "AccountsController@bank_partial_payment_submit"
    ]);





/*--------- Start---------------*/

Route::any('myaccount',[
	'as' => 'myaccount',
	'uses' => 'AccountsController@myaccount'
]);

/*--------- End---------------*/


	Route::any('order-checkout',[
		'as' => 'order-checkout',
		'uses' => 'OrderController@ordercheckout'
	]);

Route::any('order/confirm',[
        'as' => 'order-check-order',
        'uses' => 'OrderController@orderconfirm'
    ]);

Route::any('delete_order_tmp/{order_tmp_id}',[
		'as' => 'delete_order_tmp',
		'uses' => 'OrderController@delete_order_tmp'
	]);

Route::any("customer-registration", [
    "as"   => "customer-registration",
    "uses" => "OrderController@customerregister"
]);


Route::any("order/customer-login", [
    "as"   => "customer-login",
    "uses" => "OrderController@customerlogin"
]);


Route::any("order/customerdeliverydetails", [
    "as"   => "customer-delivery-detail",
    "uses" => "OrderController@savedeliverydetails"
]);

Route::any("accounts/updatebillingdetail", [
    "as"   => "edit-billing-info",
    "uses" => "AccountsController@updatebillingdetail"
]);

Route::any("accounts/updatedeliverydetail", [
    "as"   => "edit-delivery-info",
    "uses" => "AccountsController@updatedeliverydetail"
]);

Route::any("order/customerbillingdetail", [
    "as"   => "customer-billing-detail",
    "uses" => "OrderController@customersavebilling"
]);

Route::any("order/billingaddress", [
    "as"   => "order-billing-address",
    "uses" => "OrderController@billingaddress"
]);

Route::any("order/deliverydetails", [
    "as"   => "order-delivery-detail",
    "uses" => "OrderController@deliverydetails"
]);


Route::post('order/add_to_cart',[
		'as' => 'order-add_to_cart',
		'uses' => 'OrderController@add_to_cart'
	]);

Route::post('order/add_to_cart_update',[
		'as' => 'add_to_cart_update',
		'uses' => 'OrderController@add_to_cart_update'
	]);

Route::any('pre-order',[
		'as' => 'pre-order',
		'uses' => 'ProductCategoryController@preorder'
	]);

Route::any('lay-by',[
		'as' => 'lay-by',
		'uses' => 'ProductCategoryController@layby'
	]);

Route::any('forgotpassword',[
	'as' => 'forgotpassword',
	'uses' => 'WwwController@forgotpassword'
]);

Route::any("ride-on-toys", [
	"as"   => "ride-on-toys",
	"uses" => "ProductCategoryController@ridesontoy"
]);

Route::any("product", [
	"as"   => "product",
	"uses" => "ProductCategoryController@product"
]);

Route::any('{product_slug}',[
		'as' => 'product',
		'uses' => 'ProductController@index'
	]);



/*--------- Start---------------*/

Route::any("order/paynow", [
	"as"   => "pay-now",
	"uses" => "OrderController@paynow"
]);











/*--------- End---------------*/

Route::any('{main_slug}/{sub_slug}',[
		'as' => 'product_category',
		'uses' => 'ProductCategoryController@couple'
	]);

Route::any('{main_slug}/{sub_slug}/{type}',[
		'as' => 'product_category',
		'uses' => 'ProductCategoryController@index'
	]);



});

