<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempController;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\PropertyController;

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
//Landing page
Route::get('/', function () {
    return view('home');
});
//Show about page
Route::get('/about', function () {
    return view('about');
});

//show create property form
Route::get('/property/create', [PropertyController::class, 'create']);

//store property
Route::post('/property', [PropertyController::class, 'store']);

//show all Properties
Route::get('/property/all', [PropertyController::class, 'index']);

//show propery Details
Route::get('/property/details', [PropertyController::class, 'details']);





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


