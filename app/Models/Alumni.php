<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'class_of',
        'id_number',
        'current_employer',
        'current_position',
        'current_location',
        'bio',
        'profile_picture',
    ];
}
