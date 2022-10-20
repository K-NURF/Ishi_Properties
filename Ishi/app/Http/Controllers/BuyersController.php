<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\ErrorHandler\Collecting;

use function PHPSTORM_META\type;

class BuyersController extends Controller
{
    public function index(){
        $properties = DB::table('properties')
                            ->join('images', 'properties.image', '=' , 'images.id')
                            ->get();
        
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
        $images = Image::find($property->image);
        $sugg_properties = Property::suggestedProperties($property);
        return view('BuyerViews.Showdetails')
                    ->with('property', $property)
                    ->with('images', $images)
                    ->with('suggested_properties', $sugg_properties);       
    }

    public function filter(Request $request){
        /*
        TODO: Add functionality to redirect if values are null
        */
        $filter_properties = Property::filterProperties($request);
                                
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
