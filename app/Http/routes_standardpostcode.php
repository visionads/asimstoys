<?php

Route::any("standardpostcode/state", [
    "as"   => "standardpostcode-state",
    "uses" => "StandardPostCodeController@state"
]);

Route::any("standardpostcode/state-store", [
    "as"   => "standard-state-store",
    "uses" => "StandardPostCodeController@store"
]);

Route::any("standardpostcode/state-show/{slug}", [
    "as"   => "standardpostcode-state-show",
    "uses" => "StandardPostCodeController@show"
]);

Route::any("standardpostcode/state-edit/{slug}", [
    "as"   => "standardpostcode-state-edit",
    "uses" => "StandardPostCodeController@edit"
]);

Route::any("standardpostcode/state-delete/{slug}", [
    "as"   => "standardpostcode-state-delete",
    "uses" => "StandardPostCodeController@delete"
]);

Route::any("standardpostcode/state-update/{slug}", [
    "as"   => "standardpostcode-state-update",
    "uses" => "StandardPostCodeController@update"
]);

Route::any("standardpostcode/postcode", [
    "as"   => "standardpostcode-postcode",
    "uses" => "StandardPostCodeController@postcode"
]);

Route::any("standardpostcode/postcode-store", [
    "as"   => "standardpostcode-postcode-store",
    "uses" => "StandardPostCodeController@postcode_store"
]);

Route::any("standardpostcode/postcode-show/{id}", [
    "as"   => "standardpostcode-postcode-show",
    "uses" => "StandardPostCodeController@postcodeshow"
]);

Route::any("standardpostcode/postcode-edit/{id}", [
    "as"   => "standardpostcode-postcode-edit",
    "uses" => "StandardPostCodeController@postcodeedit"
]);

Route::any("standardpostcode/postcode-delete/{id}", [
    "as"   => "standardpostcode-postcode-delete",
    "uses" => "StandardPostCodeController@postcodedelete"
]);

Route::any("standardpostcode/postcode-update/{slug}", [
    "as"   => "standardpostcode-postcode-update",
    "uses" => "StandardPostCodeController@postcodeupdate"
]);

Route::any("standardpostcode/suburb", [
    "as"   => "standardpostcode-suburb",
    "uses" => "StandardPostCodeController@suburb"
]);

Route::any("standardpostcode/suburb-store", [
    "as"   => "standardpostcode-suburb-store",
    "uses" => "StandardPostCodeController@suburb_store"
]);

Route::post('standardpostcode/suburb_postcode_ajax', [
    'as' => 'suburb_postcode_ajax',
    'uses' => 'StandardPostCodeController@suburb_postcode_ajax'
]);

Route::any("standardpostcode/suburb-show/{id}", [
    "as"   => "standardpostcode-suburb-show",
    "uses" => "StandardPostCodeController@suburbshow"
]);

Route::any("standardpostcode/suburb-edit/{id}", [
    "as"   => "standardpostcode-suburb-edit",
    "uses" => "StandardPostCodeController@suburbedit"
]);

Route::any("standardpostcode/suburb-delete/{id}", [
    "as"   => "standardpostcode-suburb-delete",
    "uses" => "StandardPostCodeController@suburbdelete"
]);

Route::any("standardpostcode/suburb-update/{slug}", [
    "as"   => "standardpostcode-suburb-update",
    "uses" => "StandardPostCodeController@suburbupdate"
]);