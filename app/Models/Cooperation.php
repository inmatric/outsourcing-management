<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $fillable = [
        'company_name', 'start_date', 'end_date', 'status', 'cooperation_type'
    ];
    use HasFactory;
}
