<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyersController extends Controller
{
    public function index(){

        $properties = Property::latest()->paginate(5);
        
        $locations = DB::table('properties')
                        ->select('location')
                        ->get();

        $unique_locations = $locations->unique('location');

        return view('BuyerViews.Buyers')
             ->with('properties', $properties)
             ->with('locations', $unique_locations);
    }

    public function show($id){
        $property = Property::find($id);
        $prop_location = $property->location;
        $sugg_properties = Property::where('location', '=', $prop_location)
                                    ->where('id', '!=', $property->id)
                                    ->orWhere('purpose', '=', $property->purpose)
                                    ->get();
        if(count($sugg_properties) < 1){
            $sugg_properties = Property::where('purpose', '=', $property->purpose)->where('id', '!=', $property->id)->get();
        }

        return view('BuyerViews.Showdetails')
                    ->with('property', $property)
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
            return "Such empty :(";
        }
        
        
    }
    
}
