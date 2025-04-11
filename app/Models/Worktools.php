<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WorkTools extends Model
{
    use HasFactory;
    protected $table = 'worktools';

    // Define fillable fields to allow mass assignment
    protected $fillable = ['name', 'description', 'purpose', 'image_path'];

    /**
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically delete the associated image when deleting a WorkTool
        static::deleting(function ($workTool) {
            if ($workTool->image_path && Storage::exists('public/' . $workTool->image_path)) {
                Storage::delete('public/' . $workTool->image_path);
            }
        });
    }
}