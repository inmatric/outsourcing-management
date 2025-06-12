<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'age',
        'phone_number',
        'skill',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
    public function workReports()
    {
        return $this->hasMany(WorkReport::class);
    }
}
