<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyersController extends Controller
{
    public function index(){

        $properties = Property::where('status', 0)->filter(request(['search']))->paginate(4);
        
        $locations = DB::table('properties')
                        ->select('location')
                        ->get();

        $unique_locations = $locations->unique('location');

        return view('BuyerViews.Buyers')
             ->with('properties', $properties)
             ->with('locations', $unique_locations);
    }

    public function show($id){
        $property = Property::where('status', 0)->find($id);
        if($property == null){
            abort(403, 'Unauthorized Action! Access Denied!');
        }
        $prop_location = $property->location;
        $user = User::find($property->user_id);
        $sugg_properties = Property::where('location', '=', $prop_location)
                                    ->where('id', '!=', $property->id)
                                    ->orWhere('purpose', '=', $property->purpose)
                                    ->get();
        if(count($sugg_properties) < 1){
            $sugg_properties = Property::where('purpose', '=', $property->purpose)->where('id', '!=', $property->id)->get();
        }

        return view('BuyerViews.Showdetails')
                    ->with('property', $property)
                    ->with('user', $user)
                    ->with('suggested_properties', $sugg_properties);       
    }

    public function filter(Request $request){
        $location = $request->filteroptions;
        $status = $request->filter_status;
        $max_price = $request->t_max_price;
        $min_price = $request->t_min_price;
        /*
        TODO: Add functionality to redirect if values are null
        */
        $filter_properties = DB::table('properties')
                                ->select('*')
                                ->where('status', 0)
                                ->where('location', '=', $location)
                                ->orWhere('purpose', '=', $status)
                                ->orWhereBetween('price', [$min_price, $max_price])
                                ->orderBy('price', 'desc')
                                ->get();
         
        $locations = DB::table('properties')
                        ->select('location')
                        ->get();
        $unique_locations = $locations->unique('location');
        if (count($filter_properties) > 0) {
            return view('BuyerViews.filter')
                        ->with('properties', $filter_properties)
                        ->with('locations', $unique_locations);
        } else {
            return redirect()->route('BuyersPage')->with('message', 'Oops! No such property found');
        }
        
    }
    
    //show buyer cart
    public function cart(){
        $user_id = auth()->user()->id;
        $properties = DB::table('potential_buyers')->where('potential_buyers.user_id', $user_id)
                                                    ->join('properties', function($join){
                                                        $join->on('potential_buyers.property_id', '=', 'properties.id')
                                                        ->where('properties.status', 0);
                                                    })
                                                    ->get();
                                            
        return view('BuyerViews.cart', ['properties' => $properties]);
    }
    
    //show bank details for buyer to purchase property

    public function bankDetails(){

    }

}
