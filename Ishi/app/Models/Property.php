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
        'cover_image',
        'outdoor_image',
        'kitchen_image',
        'bedroom_image',
        'bathroom_image',
        'living_image',
        'other_image'
    ];

    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }

    //relationship to owner
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relationship with potential_buyers
    public function potential_buyers()
    {
        return $this->hasMany(Potential_buyers::class, 'property_id');
    }

    //relationship with confirmation
    public function confirmation()
    {
        return $this->hasMany(Confirmation::class, 'property_id');
    }
}
