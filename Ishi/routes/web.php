<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Potential_buyersController;
use App\Http\Controllers\RentingController;
use App\Http\Controllers\WishlistController;

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

//show contact us page
Route::get('/contactUs', function () {
    return view('contactUs');
})->middleware('auth');


//show create property form
Route::get('/property/create', [PropertyController::class, 'create'])->middleware('auth');

//store property
Route::post('/property', [PropertyController::class, 'store'])->middleware('auth');

//show all Properties
Route::get('/property', [PropertyController::class, 'index'])->middleware('auth');

//show property Details
Route::get('/property/details', [PropertyController::class, 'details'])->middleware('auth');

Route::post('/property/renting', [RentingController::class, 'store'])->middleware('auth');

//show confirmation form
Route::get('/property/confirm/{property}', [PropertyController::class, 'confirm']);

//show confirmation form
Route::get('/properties/confirm/{property}', [PropertyController::class, 'confirmBuyer']);

//add to confirmation table
Route::post('/property/confirm', [PropertyController::class, 'addConfirm']);

Route::post('/properties/confirm', [PropertyController::class, 'addConfirmBuyer']);

//change property status
Route::get('/property/changeStatusA/{property}', [PropertyController::class, 'changeStatusA']);
Route::get('/property/changeStatusB/{property}', [PropertyController::class, 'changeStatusB']);

//manage property
Route::get('/property/{property}', [PropertyController::class, 'show'])->middleware('auth');

//edit property
Route::get('/property/{property}/edit', [PropertyController::class, 'edit'])->middleware('auth');

//update property
Route::put('/property/{property}',[PropertyController::class, 'update'])->middleware('auth');

//delete property
Route::delete('/property/{property}',[PropertyController::class, 'delete'])->middleware('auth');

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

//display buyer cart
Route::get('/properties/cart', [BuyersController::class,'cart']);

//add property to potential_buyer table
Route::get('/properties/add/{property}', [Potential_buyersController::class, 'add']); 

//show bank details
Route::get('/properties/paid', [PropertyController::class, 'ownershipChange']);

/*  TODO on Buyer Page
    => Create a controller to show the properties.
    => Create a function in the controller to display the individual properties.
*/
Route::get('/properties', [BuyersController::class, 'index'])->name('BuyersPage');
Route::get('/properties/{id}', [BuyersController::class, 'show'])->middleware('auth');
Route::post('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->middleware('auth');
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth');
Route::delete('/wishlist/{property_id}', [WishlistController::class, 'remove'])->middleware('auth');
// Route::get('/properties/{id}', function($id){
//     return view('BuyerViews.ShowDetails',
//         ['property' => Property::find($id)]
//     );
// })->where('id', '[0-9]+');
// Route::get('/blah', function(){
//     return view('BuyerViews.ShowDetails');
// });
Route::get('/filter', [BuyersController::class, 'filter'])->middleware('auth');

//delete from cart
Route::delete('/properties/cart/{property_id}', [Potential_buyersController::class, 'remove'])->middleware('auth');

Route::get('/chat-with-us', function () {
    $user = auth()->user();
    return view('chat', ['user' => $user]);
});