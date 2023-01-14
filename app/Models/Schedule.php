<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $fillable = [
    'shifts',
    'day',
    'time_in',
    'time_out'
    ];

    /**
     * The employee_schedules that belong to the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employee_schedules()
    {
        return $this->belongsToMany(User::class, 'employee_schedules', 'employee_id', 'schedule_id');
    }
}
