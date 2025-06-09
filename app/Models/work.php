<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'work_type',
        'task',
        'work_detail',
    ];

    public function locationDivision()
    {
        return $this->hasMany(LocationDivision::class);
    }

    public function processingWDs()
    {
        return $this->hasMany(ProcessingWD::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
