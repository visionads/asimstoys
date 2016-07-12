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


Route::any("coupon/index", [
    "as"   => "coupon-index",
    "uses" => "CouponCodeController@index"
]);

Route::any("coupon/store", [
    "as"   => "coupon-store",
    "uses" => "CouponCodeController@store"
]);

Route::any("coupon/show/{slug}/{id}", [
    "as"   => "coupon-show",
    "uses" => "CouponCodeController@show"
]);

Route::any("coupon/edit/{slug}/{id}", [
    "as"   => "coupon-edit",
    "uses" => "CouponCodeController@edit"
]);

Route::any("coupon/update/{slug}/{id}", [
    "as"   => "coupon-update",
    "uses" => "CouponCodeController@update"
]);

Route::any("coupon/delete/{slug}/{id}", [
    "as"   => "coupon-delete",
    "uses" => "CouponCodeController@delete"
]);






