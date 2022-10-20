<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class BuyersController extends Controller
{
    public function index(){
        $properties = Property::latest()->filter(request(['search']))->paginate(4);
        return view('BuyerViews.Buyers')
            ->with('properties', $properties);
    }
    public function show($id){
        $property = Property::find($id);
        // return $property;
        return view('BuyerViews.Showdetails')
            ->with('property', $property);
    }
}
