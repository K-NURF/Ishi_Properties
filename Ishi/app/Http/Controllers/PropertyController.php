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
    public function create()
    {
        if (auth()->user()->role != "owner") {
            abort(403, 'Unauthorized Action! This page is for property owners only');
        }
        return view('owners.create');
    }

    //store property data
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => ['required', Rule::unique('properties', 'address')],
            'location' => 'required',
            'type' => 'required',
            'purpose' => 'required',
            'price' => 'required',
            'website' => 'nullable',
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

        return redirect('/property')->with('message', 'Property added successfully');
    }

    //show all properties for an owner
    public function index()
    {
        if (auth()->user()->role != "owner") {
            abort(403, 'Unauthorized Action! This page is for property owners only');
        }

        return view('owners.index', [
            'properties' => auth()->user()->properties()->filter(request(['search']))->paginate(6)
        ]);
    }

    //show details of properties
    public function show(Property $property)
    {
        if (auth()->user()->role != "owner") {
            abort(403, 'Unauthorized Action! This page is for property owners only');
        }
        if (auth()->user()->id != $property->user_id) {
            abort(403, 'Unauthorized Action! Access Denied!');
        }

        $wishlist = DB::table('wishlists')->where('wishlists.property_id', $property->id)->count();

        $potential_buyers = DB::table('potential_buyers')->where('property_id', $property->id)
            ->join('users', 'potential_buyers.user_id', '=', 'users.id')
            ->get();
        return view('owners.show', ['property' => $property, 'potential_buyers' => $potential_buyers, 'interested' => $wishlist]);
    }

    //show confirmation form
    public function confirm(Property $property)
    {
        return view('owners.confirmation-form', ['property' => $property]);
    }

    public function confirmBuyer(Property $property)
    {
        return view('BuyerViews.confirmation-form', ['property' => $property]);
    }

    //add to confirmation table
    public function addConfirm(Request $request)
    {
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
    //show edit form
    public function edit(Property $property)
    {
        return view('owners.edit', ['property' => $property]);
    }
    // update property data
    public function update(Request $request, Property $property)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'type' => 'required',
            'purpose' => 'required',
            'price' => 'required',
            'website' => 'nullable',
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

        $property->update($data);

        return redirect('/property')->with('message', 'Property updated successfully');
    }
    //delete property
    public function delete(Property $property)
    {
        $property->delete();
        return redirect('/property')->with('message', 'Property deleted successfully');
    }
    //add to confirmation table
    public function addConfirmBuyer(Request $request)
    {
        $data = $request->validate([
            'property_id' => 'required',
        ]);

        $data2 = $request->validate([
            'price' => 'required',
            'communication' => 'required'

        ]);

        $data['user_id'] = auth()->user()->id;

        $propertyId = $data['property_id'];

        $OwnerId = DB::table('properties')->where('properties.id', $propertyId)->pluck('user_id');

        $OwnerData = DB::table('confirmations')->where('confirmations.user_id', $OwnerId)->where('confirmations.property_id', $propertyId)->pluck('price', 'communication');

        $propertyStatus =  DB::table('properties')->where('properties.id', $propertyId)->pluck('status');

        if ($propertyStatus != '[0]') {
            return redirect('/properties/cart')->with('message', 'Looks like this property is no longer available, consult owner for clarification');
        }

        if ($OwnerData == '[]') {
            return redirect('/properties/cart')->with('message', 'Looks like the owner has not been confirmed yet, please try again later');
        }

        //comparing the buyer and owner values for confirmation
        $buyerID = auth()->user()->id;


        Confirmation::firstOrCreate($data, $data2);

        $buyerData = DB::table('confirmations')->where('confirmations.user_id', $buyerID)->where('confirmations.property_id', $propertyId)
            ->pluck('price', 'communication');

        if ($OwnerData == $buyerData) {
            // return redirect('properties/bank')->with('property_id', $propertyId);
            session(['property_id' => $propertyId]);
            return view('BuyerViews.bank_details');
        } else {
            return redirect('/properties/cart')->with('message', 'Failed to confirmation eligiblity of communication. Please contact us for further instructions');
        }
    }

    //ownership change after buying property
    public function ownershipChange()
    {
        //get property id and change owner id and change status

        $propertyId = session()->pull('property_id');

        $buyerID = auth()->user()->id;
        $buyerRole = auth()->user()->role;

        if ($buyerRole != "owner") {
            DB::table('users')->where('users.id', $buyerID)->update(['role' => 'owner']);
        }
        $PropertyStatus = DB::table('properties')->where('properties.id', $propertyId)->pluck('status');
        if ($PropertyStatus == '[0]') {
            DB::table('properties')->where('properties.id', $propertyId)->update(['user_id' => $buyerID, 'status' => 1]);

            DB::table('potential_buyers')->where('potential_buyers.property_id', $propertyId)->delete();

            return redirect('/property')->with('message', 'Congratulations on your purchase. Thank you for trusting us with your property needs. You are now an Ishi Properties Owner');
        }
        return redirect('/properties')->with('message', 'Oops! Looks like someone else just purchased this property');
    }

    //change property status
    public function changeStatusA(Property $property) {
        DB::table('properties')->where('id', $property->id)->update(['status' => 2]);
        return redirect('/property/'.$property->id)->with('message', 'Property is now no longer visible to clients');
    }
    public function changeStatusB(Property $property) {
        DB::table('properties')->where('id', $property->id)->update(['status' => 0]);
        return redirect('/property/'.$property->id)->with('message', 'Property is now available to clients');
    }
}
