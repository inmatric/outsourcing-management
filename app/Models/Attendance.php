<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'photo',
        'end_photo',
        'keterangan',
    ];
}
