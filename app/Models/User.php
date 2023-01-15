<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\Attendance;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'position_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class,'users_id');
    }

    public function positions(){
        return $this->belongsto(Position::class,'position_id');
    }
    public function employee_schedules()
    {
        return $this->belongsToMany(Schedule::class, 'employee_schedules', 'employee_id', 'schedule_id');
    }

    public function employee_attendance():BelongsToMany
    {
        return $this->belongsToMany(Attendance::class, 'employee_attendance', 'users_id', 'attendance_id');
    }

}
