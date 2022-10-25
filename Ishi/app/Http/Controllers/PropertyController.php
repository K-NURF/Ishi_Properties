<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
            'website'=> 'nullable',
            'description' => 'nullable'
        ]);

        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->file('image')->store('property_images', 'public');
        // }

        $data['user_id'] = auth()->id();

        Property::create($data);

        return redirect('/')->with('message', 'Property added successfully');
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

    //manage property
    public function manage(){
        // $id = auth()->id();
        // $properties = DB::table('properties')->join('users', 'properties.user_id', '=', $id);
        // return $properties;
        $properties = [auth()->user()->properties()->get()];
        return $properties;
    }
}
