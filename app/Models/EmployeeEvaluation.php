<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEvaluation extends Model
{
    protected $fillable = [
        'employee_id',
        'evaluation_date',
        'information',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
