<?php

namespace App\Models\_Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable =['user_id','date','hour','nots'];

    public function getHourAttribute()
    {
        return $this->attributes['hour'] ? json_decode($this->attributes['hour']) : [];
    }
}
