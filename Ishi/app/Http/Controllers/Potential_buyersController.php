<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Potential_buyers;

class Potential_buyersController extends Controller
{
    //add details to table
    public function add(Property $property){
        //adds the user_id and property_id to Potential_buyers table
        Potential_buyers::firstOrCreate([//this methods checks first if the record exists, if not adds
            'user_id' => auth()->user()->id,
            'property_id' => $property->id
        ]);

        return redirect("/properties/$property->id")->with('message','The owner has been notified. Check your cart');

    }
    public function remove($prop_id){
        $user_id=auth()->user()->id;
        Potential_buyers::where([
        ['property_id', '=', $prop_id],
        ['user_id', '=',$user_id ] ])
        ->delete();
        return redirect('/properties/cart')->with('message', 'Removed from cart');       
    }
}
