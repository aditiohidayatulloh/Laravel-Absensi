<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salary;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $table = "position";
    protected $fillable = [
        'position_name',
        'salary_id',
        'division_id',
        'description'
    ];

    public function users(){
        return $this->hasMany(User::class,'position_id','id');
    }

    public function salaries() {
        return $this->belongsto(Salary::class,'salary_id');
    }

    public function division() {
        return $this->belongsto(Division::class,'division_id');
    }
}
