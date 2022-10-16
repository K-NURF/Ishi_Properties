<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $primaryKey = 'propertyId';
    protected $fillable = [
        'propertyName',
        'propertyLocation',
        'Address',
        'Description',
        'Status',
        'Image',
        'OwnerId'
    ];
}
