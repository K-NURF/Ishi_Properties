<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\ClientsController;
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
Route::get('/property/create', [PropertyController::class, 'create'])->middleware('auth');

//store property
Route::post('/property', [PropertyController::class, 'store'])->middleware('auth');

//show all Properties
Route::get('/property/all', [PropertyController::class, 'index']);

//show property Details
Route::get('/property/details', [PropertyController::class, 'details']);

//manage property
Route::get('/property/manage', [PropertyController::class, 'manage'])->middleware('auth');

//show owners register form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//show clients register form
Route::get('/clients/register',[CLientsController::class,'create'])->middleware('guest');

//create client new user
Route::post('/clients/users', [ClientsController::class, 'store']);

//create owner new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show Owners login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//show client login form
Route::get('/clients/login',[ClientsController::class,'login'])->middleware('guest');

//login owner user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//login client user
Route::post('/clients/authenticate',[ClientsController::class,'authenticate']);



/*  TODO on Buyer Page
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', [BuyersController::class, 'index']);
Route::get('/properties/{id}', [BuyersController::class, 'show']);
// Route::get('/properties/{id}', function($id){
//     return view('BuyerViews.ShowDetails',
//         ['property' => Property::find($id)]
//     );
// })->where('id', '[0-9]+');
// Route::get('/blah', function(){
//     return view('BuyerViews.ShowDetails');
// });

Route::get('blah2', [PropertyController::class, 'manage']);