<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'start_date', 'end_date', 'status', 'cooperation_type'
    ];
   
    protected $table = 'cooperations';

    // public function locationDivisions()
    // {
    //     return $this->hasMany(LocationDivision::class);
    // }
}
