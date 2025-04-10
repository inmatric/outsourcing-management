<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
    protected $table = 'locations';

    // Kolom yang boleh diisi
    protected $fillable = [
        'company',
        'location',
        'location_code',
        'location_type',
        'information',
        'status',
    
    ];
}    
