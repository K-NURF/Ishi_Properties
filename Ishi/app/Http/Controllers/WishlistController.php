<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WishlistController extends Controller
{
    public function index(){
        $conte = DB::table('wishlists')->join('properties', 'wishlists.property_id', '=', 'properties.id')->where('wishlists.user_id', '=', auth()->user()->id)->get();
        return view('BuyerViews.wishlist')->with('properties', $conte);
    }

    public function addToWishlist(Request $request){
        Wishlist::firstOrCreate([//this methods checks first if the record exists, if not adds
            'user_id' => auth()->user()->id,
            'property_id' => $request->t_prop_id
        ]);
        return Redirect::back()->with('message', 'Added to wishlist');
    }
    public function remove($prop_id){
        Wishlist::where('property_id', '=', $prop_id)->delete();
        return redirect('/wishlist')->with('message', 'Removed from wishlist');       
    }
}
