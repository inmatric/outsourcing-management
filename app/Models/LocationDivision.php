<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDivision extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location_id',
        'work_id',
        'detail_work',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }    
    
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    public function cooperation()
{
    return $this->belongsTo(Cooperation::class);
}

}