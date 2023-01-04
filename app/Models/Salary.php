<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salary';
    protected $fillable = [
        'class','salary'
    ];

    public function position(){
        return $this->hasMany(Position::class,'id','salary_id');
    }
}
