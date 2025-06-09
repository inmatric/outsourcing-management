<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'age',
        'phone_number',
        'card_id',
    ];

    public function locationDivision()
    {
        return $this->hasMany(LocationDivision::class);
    }

    public function processingWDs()
    {
        return $this->hasMany(ProcessingWD::class);
    }
}
