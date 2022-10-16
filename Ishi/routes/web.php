<?php

use App\Http\Controllers\BuyersController;
use App\Http\Controllers\TempController;
use App\Models\Property;
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
Route::get('/about', function () {
    return view('about');
});
Route::get('/property', function () {
    return view('properties.index');
});

/*  TODO on Buyer Page 
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', [BuyersController::class, 'index']);
Route::get('/properties/{id}', [BuyersController::class, 'show']);
// Route::get('/properties/{id}', function($id){
//     return view('BuyerViews.Showdetails',
//         ['property' => Property::find($id)]
//     );
// })->where('id', '[0-9]+');
// Route::get('/blah', function(){
//     return view('BuyerViews.Showdetails');
// });


