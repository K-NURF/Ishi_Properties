<?php

use App\Http\Controllers\BuyersController;
use App\Http\Controllers\TempController;
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

/*  TODO on Buyer Page 
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', [BuyersController::class, 'index']);


