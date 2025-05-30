<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'address',
        'age',
        'phone_number',
        'card_id',
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
