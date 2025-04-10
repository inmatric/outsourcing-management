<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    // Nama tabel
    protected $table = 'location_type';

    // Kolom yang bisa diisi
    protected $fillable = [
        'name',
        'description'
    ];

    // Nonaktifkan timestamps (created_at & updated_at)
    public $timestamps = false;
}
