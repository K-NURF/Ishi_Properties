<?php

namespace App\Http\Controllers;

use App\Models\renting;
use Illuminate\Http\Request;

class RentingController extends Controller
{
    //store details
    public function store(Request $request){
        $data = $request->validate([
            'property_id' => 'required',
            'rooms' => 'required'
        ]);

        renting::firstOrCreate($data);

        return redirect('/property')->with('message', 'Room data successfully stored');

    }
}
