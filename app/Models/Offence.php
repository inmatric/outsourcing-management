<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offence extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'employe_name',
        'date',
        'offence_category',
        'offence_description',
        'image',
    ];
}


