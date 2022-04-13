<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|-----------------------------------------------------------------------
| RAW QUERIES
|-----------------------------------------------------------------------
*/

Route::get('/insert', function(){
   
    DB::insert('insert into posts(title, content) values(?,?)',['PHP with Laravel','Laravel is the best thing that has happened to PHP']);

});







/*
|-----------------------------------------------------------------------
|  ELOQUENT ORM
|-----------------------------------------------------------------------
*/