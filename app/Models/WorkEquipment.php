<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkEquipment extends Model
{
    use HasFactory;

    protected $table = 'work_equipment'; // pastikan ini sesuai dengan nama tabel
    protected $fillable = [
        'employee_id',
        'work_id',
        'location_id',
        'equipment',
        'condition',
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

}
