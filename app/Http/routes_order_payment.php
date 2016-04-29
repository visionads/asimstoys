<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*----------Order Paid --------------*/

Route::any("order_paid/index", [
    "as"   => "order-paid-index",
    "uses" => "OrderPaymentController@order_paid_index"
]);

Route::any("order_paid/show/{id}", [
    "as"   => "order-paid-show",
    "uses" => "OrderPaymentController@order_show"
]);

Route::any("order_paid/approve/{id}", [
    "as"   => "order-paid-approve",
    "uses" => "OrderPaymentController@approve"
]);

Route::any("order_paid/cancel/{id}", [
    "as"   => "order-paid-cancel",
    "uses" => "OrderPaymentController@cancel"
]);


/*----------Lay BY-------------*/


Route::any("lay_by/index", [
    "as"   => "lay-by-index",
    "uses" => "OrderPaymentController@lay_by_index"
]);
