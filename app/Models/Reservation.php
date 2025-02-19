<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'is_attending',
        'is_paid',
    ];
}
