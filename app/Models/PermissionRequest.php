<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'izin_type',
        'description',
        'start_date',
        'end_date',
        'status',
        'submitted_at',
        'approved_by',
        'approved_at',
        'attachment',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

}
