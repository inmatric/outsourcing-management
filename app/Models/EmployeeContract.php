<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeContractFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'employee-id',
        'employee-name',
        'contract-number',
        'start-date',
        'end-date',
        'position',
        'location-id',
        'working-hours',
        'salary',
        'status',
        'contract-file'
    ];
}
