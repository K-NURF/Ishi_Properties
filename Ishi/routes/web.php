<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempController;
use App\Http\Controllers\UserController;
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
Route::get('/property/create', [PropertyController::class, 'create'])->middleware('auth');

//store property
Route::post('/property', [PropertyController::class, 'store'])->middleware('auth');

//show all Properties
Route::get('/property', [PropertyController::class, 'index'])->middleware('auth');

//show property Details
Route::get('/property/details', [PropertyController::class, 'details'])->middleware('auth');

//manage property
Route::get('/property/{property}', [PropertyController::class, 'show'])->middleware('auth');

//edit property
Route::get('/property/{property}/edit', [PropertyController::class, 'edit'])->middleware('auth');

//update property
Route::put('property/{property}',[PropertyController::class, 'update'])->middleware('auth');

//show owner owners register form
Route::get('/owner/register',[UserController::class,'createOwner'])->middleware('guest');
//show buyer register form
Route::get('/buyer/register',[UserController::class,'createBuyer'])->middleware('guest');

//create owner new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

/*  TODO on Buyer Page
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', [BuyersController::class, 'index'])->name('BuyersPage')->middleware('auth');
Route::get('/properties/{id}', [BuyersController::class, 'show'])->middleware('auth');
// Route::get('/properties/{id}', function($id){
//     return view('BuyerViews.ShowDetails',
//         ['property' => Property::find($id)]
//     );
// })->where('id', '[0-9]+');
// Route::get('/blah', function(){
//     return view('BuyerViews.ShowDetails');
// });
Route::get('/filter', [BuyersController::class, 'filter'])->middleware('auth');

Route::get('blah2', [PropertyController::class, 'manage'])->middleware('auth');