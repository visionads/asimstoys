<?php

Route::any("product_subgroup/index", [
    "as"   => "product-subgroup-index",
    "uses" => "ProductSubgroupsController@index"
]);

Route::any("product-subgroup-store/store", [
    "as"   => "product-subgroup-store",
    "uses" => "ProductSubgroupsController@store"
]);

Route::any("product-subgroup-show/show/{id}", [
    "as"   => "product-subgroup-show",
    "uses" => "ProductSubgroupsController@show"
]);

Route::any("product-subgroup-edit/edit/{id}", [
    "as"   => "product-subgroup-edit",
    "uses" => "ProductSubgroupsController@edit"
]);

Route::any("product-subgroup-update/{slug}", [
    "as"   => "product-subgroup-update",
    "uses" => "ProductSubgroupsController@update"
]);

Route::any("product-subgroup-delete/delete/{slug}", [
    "as"   => "product-subgroup-delete",
    "uses" => "ProductSubgroupsController@delete"
]);