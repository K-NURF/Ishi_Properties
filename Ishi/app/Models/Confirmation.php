<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'price',
        'communication',
        'property_id'
    ];

    //relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relationship to property
    public function property() {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
