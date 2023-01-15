<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeAttendance extends Model
{
    use HasFactory;
    protected $table = 'employee_attendance';
    protected $fillable = [
    'users_id',
    'attendance_id',
    'employee_in',
    'employee_out',
    'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class,'attendance_id','id');
    }

}
