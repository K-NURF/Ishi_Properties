<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'location',
        'type',
        'purpose',
        'website',
        'description',
        'image'
    ];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'. request('search').'%')
            ->orWhere('address', 'like', '%'. request('search').'%')
            ->orWhere('location', 'like', '%'. request('search').'%'); 
        }
    }
}
