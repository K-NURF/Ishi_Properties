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
        return view('owners.create');
    }

    //store property data
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'address' => ['required', Rule::unique('properties', 'address')],
            'location' => 'required',
            'type' => 'required',
            'purpose' => 'required',
            'price' => 'required',
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

    //show all properties for an owner
    public function index(){

        return view('owners.index', ['properties' => auth()->user()->properties()->filter(request(['search']))->paginate(6)
        // return view('owners.index', ['properties' => Property::latest()
        
    ]);
    }

    //show details of properties
    public function details(){
        return view('owners.show');
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
