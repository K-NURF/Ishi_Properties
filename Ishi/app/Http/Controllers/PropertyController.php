<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    //show create form
    public function create(){
        return view('properties.create');
    }

    //store property data
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'address' => ['required', Rule::unique('properties', 'address')],
            'location' => 'required',
            'type' => 'required',
            'purpose' => 'required',
            'website'=> 'nullable'
        ]);

        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->file('image')->store('property_images', 'public');
        // }

        Property::create($data);

        return redirect('/');
    }

    //show all properties
    public function index(){
        return view('properties.index', ['properties' => Property::latest()->filter(request(['search']))->paginate(6)
        
    ]);
    }

    //show details of properties
    public function details(){
        return view('properties.show');
    }
}
