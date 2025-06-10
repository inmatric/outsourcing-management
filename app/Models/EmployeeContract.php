<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeContractFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'contract_number',
        'start_date',
        'end_date',
        'position',
        'location_id',
        'working_hours',
        'salary',
        'status',
        'contract_file',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
