<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $fillable =
    [
        'attendance_date',
        'time_in',
        'time_out',
        'description'
    ];

    public function employee_attendance():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'employee_attendance', 'users_id', 'attendance_id');
    }


}
