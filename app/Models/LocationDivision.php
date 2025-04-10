<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDivision extends Model
{
    use HasFactory;

    protected $table = 'location_divisions';

    protected $fillable = [
        'employee_name',
        'company',
        'location',
        'work_type',
        'work_detail',
        'status',
    ];
    
}
