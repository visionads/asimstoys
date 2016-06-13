<?php

Route::any("state/index", [
    "as"   => "state-index",
    "uses" => "StateController@index"
]);

Route::any("state/add_index", [
    "as"   => "state-add_index",
    "uses" => "StateController@add_index"
]);

Route::any("state/store", [
    "as"   => "state-store",
    "uses" => "StateController@store"
]);