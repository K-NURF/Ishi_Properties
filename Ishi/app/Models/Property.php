<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        //'user_id',
        'address',
        'location',
        'type',
        'purpose',
        'price',
        'website',
        'description',
        //'image'
    ];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'. request('search').'%')
            ->orWhere('address', 'like', '%'. request('search').'%')
            ->orWhere('location', 'like', '%'. request('search').'%'); 
        }
    }

    //relationship to owner
    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }


    public function scopeSuggestedProperties($query, object $par){
    $query = DB::table('properties')->join('images', 'properties.image', '=' , 'images.id')->get();
    $res = $query->where('location', '=', $par->location)->where('id', '!=', $par->id)->where('purpose', '=', $par->purpose);
    return $query; 
    // $filter_properties = DB::table('properties')
    //     ->select('properties.id', 'properties.name', 'properties.purpose', 'properties.location', 'properties.address', 'images.Outdoor')->join('images', 'properties.image', '=', 'images.id')
    //     ->where('id', '!=', $par->id)
    //     ->where('location', '=', $par->location)
    //     ->orWhere('purpose', '=', $par->purpose)
    //     ->orderBy('price', 'desc');
    // return $filter_properties;
    }
    public function scopeFilterProperties($query, Request $request){
        $location = $request->filteroptions;
        $status = $request->filter_status;
        $max_price = $request->t_max_price;
        $min_price = $request->t_min_price;

        //$query = DB::table('properties')->join('images', 'properties.image', '=' , 'images.id')->get();
        $filter_properties = DB::table('properties')
        ->select('properties.id', 'properties.name', 'properties.purpose', 'properties.location', 'properties.address', 'images.Outdoor')->join('images', 'properties.image', '=', 'images.id')
        ->where('location', '=', $location)
        ->orWhere('purpose', '=', $status)
        ->orWhereBetween('price', [$min_price, $max_price])
        ->orderBy('price', 'desc')
        ->get();
        return $filter_properties;

    }

}
