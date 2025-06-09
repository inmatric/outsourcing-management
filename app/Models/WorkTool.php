<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTool extends Model
{
    use HasFactory;

    // Ini penting untuk menyamakan dengan nama tabel
    protected $table = 'worktools';

    protected $fillable = [
        'name',
        'description',
        'purpose',
        'image',
    ];

    
}
