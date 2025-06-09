<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProcessingWD extends Model
{
    use HasFactory;

    protected $table = 'processing_w_d_s';

    protected $fillable = [
        'task_name',
        'employee_name',
        'start_time',
        'end_time',
        'duration_sec',
        'photo_before_path',
        'photo_after_path',
        'status',
        'notes'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function getDurationAttribute()
    {
        if (!$this->duration_sec) {
            return null;
        }

        $hours = floor($this->duration_sec / 3600);
        $minutes = floor(($this->duration_sec % 3600) / 60);
        $seconds = $this->duration_sec % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    public function getPhotoBeforeUrlAttribute()
    {
        return $this->photo_before_path 
            ? Storage::url($this->photo_before_path)
            : null;
    }

    public function getPhotoAfterUrlAttribute()
    {
        return $this->photo_after_path 
            ? Storage::url($this->photo_after_path)
            : null;
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'inprogress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function startTask()
    {
        return $this->update([
            'start_time' => now(),
            'status' => 'inprogress'
        ]);
    }

    public function completeTask($photoAfterPath, $notes = null)
    {
        return $this->update([
            'end_time' => now(),
            'duration_sec' => $this->start_time->diffInSeconds(now()),
            'photo_after_path' => $photoAfterPath,
            'status' => 'completed',
            'notes' => $notes
        ]);
    }
}