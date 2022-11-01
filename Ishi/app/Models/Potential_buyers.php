<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potential_buyers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'property_id'
    ];

    //relationship to buyer
    public function buyer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relationship to property
    public function property() {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
