<?php

Route::any("youtube/index", [
    "as"   => "youtube/index",
    "uses" => "YoutubeController@index"
]);

Route::any("youtube/store", [
    "as"   => "youtube-store",
    "uses" => "YoutubeController@store"
]);

Route::any("youtube/show/{id}", [
    "as"   => "youtube-show",
    "uses" => "YoutubeController@show"
]);

Route::any("youtube/edit/{id}", [
    "as"   => "youtube-edit",
    "uses" => "YoutubeController@edit"
]);

Route::any("youtube/delete/{id}", [
    "as"   => "youtube-delete",
    "uses" => "YoutubeController@delete"
]);

Route::any("youtube/update/{id}", [
    "as"   => "youtube-update",
    "uses" => "YoutubeController@update"
]);