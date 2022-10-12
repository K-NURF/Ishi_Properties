<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

/*  TODO on Client Page 
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', function(){
    return view('BuyerViews.Client');
});

