<?php

namespace App\Models\_Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationHours extends Model
{
    use HasFactory;

    protected $fillable = ['hours'];
}
