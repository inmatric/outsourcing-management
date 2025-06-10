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
        'employee_name',
        'position',
        'location',
        'equipment',
        'condition',
    ];
}
