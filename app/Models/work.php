<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /** @use HasFactory<\Database\Factories\WorkFactory> */
    use HasFactory;
    protected $table = 'works';

    protected $fillable = [
       'job_name',
        'task_type',
        'task_details',
        'salary_per_person',
    ];
    
}
