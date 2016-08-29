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

Route::any("order-complete/{id}", [
    "as"   => "order-complete",
    "uses" => "OrderPaymentController@order_complete"
]);

Route::any("order-shipped/{id}", [
    "as"   => "order-shipped",
    "uses" => "OrderPaymentController@order_shipped"
]);

Route::any("order-archive/{id}", [
    "as"   => "order-archive",
    "uses" => "OrderPaymentController@order_archive"
]);

/*----------Lay BY-------------*/


Route::any("lay_by/index", [
    "as"   => "lay-by-index",
    "uses" => "OrderPaymentController@lay_by_index"
]);

Route::any("pre-order-list", [
    "as"   => "pre-order-list",
    "uses" => "OrderPaymentController@pre_order_list"
]);

Route::any("archive-list", [
    "as"   => "archive-list",
    "uses" => "OrderPaymentController@archive_list"
]);

Route::any("lay-by-order-show/{order_head_id}", [
    "as"   => "lay-by-order-show",
    "uses" => "OrderPaymentController@lay_by_order_show"
]);


Route::any("cancel-lay-by-payment/{ord_trn_id}", [
    "as"   => "cancel-lay-by-payment",
    "uses" => "OrderPaymentController@cancel_lay_by_payment"
]);
Route::any("approve-lay-by-transaction/{ord_trn_id}", [
    "as"   => "approve-lay-by-transaction",
    "uses" => "OrderPaymentController@approve_lay_by_transaction"
]);