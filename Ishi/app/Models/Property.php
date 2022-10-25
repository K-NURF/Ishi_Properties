<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'address',
        'location',
        'type',
        'purpose',
        'price',
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

    //relationship to owner
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
