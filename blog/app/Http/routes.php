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

Route::get('/', [
  "uses" => "BlogsController@index",
  "as" => "blog"
]);

Route::get('/blog/{post}', [
  "uses"=>"BlogsController@show",
  "as"=>"blog.show"
]);

Route::get('/category/{category}', [
  "uses"=>"BlogsController@category",
  "as"=>"category"
]);
