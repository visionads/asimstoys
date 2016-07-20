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


Route::any("brand-index", [
    "as"   => "brand-index",
    "uses" => "BrandController@index"
]);

Route::any("brand-add-index", [
    "as"   => "brand-add-index",
    "uses" => "BrandController@add_index"
]);

Route::any("brand-store", [
    "as"   => "brand-store",
    "uses" => "BrandController@store"
]);

Route::any("brand-show/{slug}", [
    "as"   => "brand-show",
    "uses" => "BrandController@show"
]);

Route::any("brand-edit/{slug}", [
    "as"   => "brand-edit",
    "uses" => "BrandController@edit"
]);

Route::any("brand-update/{slug}", [
    "as"   => "brand-update",
    "uses" => "BrandController@update"
]);

Route::any("brand-delete/{slug}", [
    "as"   => "brand-delete",
    "uses" => "BrandController@delete"
]);