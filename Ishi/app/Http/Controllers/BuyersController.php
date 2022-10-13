<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class BuyersController extends Controller
{
    public function index(){
        $properties = Property::all();
        return view('BuyerViews.Client')
            ->with('properties', $properties);
    }
}
