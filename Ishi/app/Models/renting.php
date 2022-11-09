<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class renting extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'rooms'
    ];

        //relationship to property
        public function property() {
            return $this->belongsTo(Property::class, 'property_id');
        }
}
