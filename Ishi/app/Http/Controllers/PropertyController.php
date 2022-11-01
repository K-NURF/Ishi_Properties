<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Potential_buyers;
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

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('Cover', 'public');
        }
        if ($request->hasFile('outdoor_image')) {
            $data['outdoor_image'] = $request->file('outdoor_image')->store('Outdoor', 'public');
        }
        if ($request->hasFile('kitchen_image')) {
            $data['kitchen_image'] = $request->file('kitchen_image')->store('Kitchen', 'public');
        }
        if ($request->hasFile('bathroom_image')) {
            $data['bathroom_image'] = $request->file('bathroom_image')->store('Bathroom', 'public');
        }
        if ($request->hasFile('bedroom_image')) {
            $data['bedroom_image'] = $request->file('bedroom_image')->store('Bedroom', 'public');
        }
        if ($request->hasFile('living_image')) {
            $data['living_image'] = $request->file('living_image')->store('Living_room', 'public');
        }
        if ($request->hasFile('other_image')) {
            $data['other_image'] = $request->file('other_image')->store('Other', 'public');
        }

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
    public function show(Property $property){
        $potential_buyers = DB::table('potential_buyers')->where('property_id', $property->id)
                                                        ->join('users', 'potential_buyers.user_id', '=', 'users.id')
                                                        ->get();
        return view('owners.show', ['property' => $property, 'potential_buyers' => $potential_buyers]);
        
    }

    //show confirmation form
    public function confirm(Property $property){
        return view('owners.confirmation-form', ['property' => $property]);
    }
    public function confirmBuyer(Property $property){
        return view('BuyerViews.confirmation-form', ['property' => $property]);
    }

    //add to confirmation table
    public function addConfirm(Request $request){
        $data = $request->validate([
            'property_id' => 'required',
        ]);

        $data2 = $request->validate([
            'price' => 'required',
            'communication' => 'required'

        ]);
        $data['user_id'] = auth()->user()->id;

        Confirmation::firstOrCreate($data, $data2);

        return redirect('/property')->with('message', 'Confirmation successful');

    }

    //add to confirmation table
    public function addConfirmBuyer(Request $request){
        $data = $request->validate([
            'property_id' => 'required',
        ]);

        $data2 = $request->validate([
            'price' => 'required',
            'communication' => 'required'

        ]);

        $data['user_id'] = auth()->user()->id;

        Confirmation::firstOrCreate($data, $data2);
    
        //comparing the buyer and owner values for confirmation
        $buyerID = auth()->user()->id;
        $propertyId = DB::table('confirmations')-> where ('confirmations.user_id',$buyerID)-> pluck('property_id');

        $OwnerId = DB::table('properties')->where('properties.id',$propertyId)->pluck('user_id');

          $buyerData=DB::table('confirmations')-> where ('confirmations.user_id',$buyerID)-> pluck('price','communication');

          $OwnerData = DB::table('confirmations')-> where ('confirmations.user_id',$OwnerId)-> pluck('price','communication');
          
         if($OwnerData == $buyerData){
           return view('BuyerViews.bank_details');
         }

         else
        echo $OwnerData;
        
        //return redirect('/property')->with('message', 'Confirmation successful');

    }

}
