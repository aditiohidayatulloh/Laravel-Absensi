<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $table = 'division';
    protected $fillable = [
        'division_name',
        'description'
    ];

    public function position(){
        return $this->hasMany(Position::class,'id','division_id');
    }
}
