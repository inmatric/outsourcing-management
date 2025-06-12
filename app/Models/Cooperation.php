<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    use HasFactory;
    protected $table = 'cooperations'; 

    protected $fillable = [
        'company_name', 'start_date', 'end_date', 'status', 'cooperation_type', 'contract_file'
    ];

    public function locationDivision()
    {
        return $this->hasMany(LocationDivision::class);
    }

    public function fund()
    {
        return $this->hasMany(Fund::class);
    }
}
